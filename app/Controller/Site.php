<?php

namespace Controller;

use Model\ListRoom;
use Model\Room;
use Model\Type;
use Src\Validator\Validator;
use Src\View;
use Src\Request;
use Model\User;
use Model\Building;
use Src\Auth\Auth;
class Site
{
    public function hello()
    {
        return (new View())->render('site.hello',['message' => 'Сайт для работы с учебно-методическим управлением, перейдите в профиль для работы']);
    }

    public function profile(Request $request): string
    {
        $userId = app()->auth->user()->id;

        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'nickname' => ['required', 'minlength'],
                'role_id' => [],
                'surname' => ['required'],
                'name' => ['required'],
                'patronymic' => [],
                'email' => ['required'],
                'password' => ['required'],
            ], [
                'required' => 'Поле :field пустое',
                'minlength' => 'Поле :field должно содержать не менее 4 символов'
            ]);

            if (($validator->errors())) {
                var_dump($validator->errors());
            }

            if ($validator->fails()) {
                return new View('site.profile', ['message' => $validator->errors()]);
            }

            $user = User::find($userId);
            $user->update($request->all());
        }

        return new View('site.profile', ['message' => 'Данные успешно обновлены']);
    }

    public function workspace_admin(Request $request): string {

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'role_id' => [],
                'surname' => ['required'],
                'name' => ['required'],
                'patronymic' => [],
                'nickname' => ['required', 'unique:users,nickname'],
                'email' => ['required'],
                'password' => ['required'],
            ], [
                'required' => 'Поле :field пустое',
                'unique' => 'Поле :field должно быть уникальным',
            ]);

            var_dump($validator->errors());

            if ($validator->fails()) {
                return new View('site.workspace',
                    ['message' => $validator->errors(), JSON_UNESCAPED_UNICODE]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/workspace_admin');
            }
        }

        $allWorkers = User::all();


        return (new View())->render('site.workspace', ['allWorkers' => $allWorkers]);
    }

    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/profile');
        }
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }

    public function room($build_id): string {
        $request = new Request();
        $building = Building::find($build_id);
        $rooms = Room::where('build_id', $build_id)->get();
        $type = Type::all();

        if ($request->method === 'POST') {
            if (isset($_POST['name_building'])) {
                $validator = new Validator($request->all(), [
                    'name_building' => ['required', 'minlength'],
                    'address_building' => ['required'],
                ], [
                    'required' => 'Поле :field пустое',
                    'minlength' => 'Поле :field должно содержать не менее 4 символов'
                ]);

                if ($validator->fails()) {
                    return new View('site.room', ['message' => $validator->errors()]);
                }

                $building->update($request->all());
            }
            else {
                $validator = new Validator($request->all(), [
                    'name' => ['required'],
                    'number' => ['required'],
                    'type_id' => ['required'],
                    'area' => ['required'],
                    'number_of_seats' => ['required'],
                ], [
                    'required' => 'Поле :field пустое',
                    'minlength' => 'Поле :field должно содержать не менее 4 символов'
                ]);

                if ($validator->fails()) {
                    return new View('site.room', ['message' => $validator->errors()]);
                }

                $room = Room::create([
                    'build_id' => $building->build_id,
                    'name' => $request->name,
                    'number' => $request->number,
                    'type_id' => $request->type_id,
                    'area' => $request->area,
                    'number_of_seats' => $request->number_of_seats,
                ]);

                $room_id = $room->id;

                ListRoom::create([
                    'build_id' => $building->build_id,
                    'room_id' => $room_id
                ]);

                app()->route->redirect('/workspace_worker');
            }
        }

        if (isset($_GET['countAreaAndSeats'])) {

            $countAreaAndSeats = $_GET['countAreaAndSeats'];
            $sumArea = Room::where('build_id', $countAreaAndSeats)->sum('area');
            $sumSeats = Room::where('build_id', $countAreaAndSeats)->sum('number_of_seats');

            return (new View())->render('site.room', ['building' => $building, 'rooms' => $rooms, 'types' => $type, 'sumArea' => $sumArea, 'sumSeats' => $sumSeats]);
        }

        return (new View())->render('site.room', ['building' => $building, 'rooms' => $rooms, 'types' => $type]);
    }

    public function workspace_worker(Request $request):string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name_building' => ['required'],
                'address_building' => ['required'],
                'image_path' => []
            ], [
                'required' => 'Поле :field пустое',
            ]);

            var_dump($validator->errors());

            if ($validator->fails()) {
                return new View('site.workspace',
                    ['message' => $validator->errors(), JSON_UNESCAPED_UNICODE]);
            }

            $image_path = $_FILES['image_path']['name'];
            $target_dir = __DIR__ . '/../../uploads/avatars/';
            $target_file = $target_dir . basename($image_path);
            $fileName = $_FILES['image_path']['name'];

            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)){

                if (Building::create([
                    'name_building' => $request->all()['name_building'],
                    'address_building' => $request->all()['address_building'],
                    'image_path' => $fileName
                ])) {
                    app()->route->redirect('/workspace_worker');
                }};

        }

        if ($request->method === 'GET' && isset($_GET['search'])) {
            $search = $_GET['search'];
            $building = Building::where('name_building', 'like', '%' . $search . '%')->first();

            if ($building) {
                return (new View())->render('site.workspace', ['building' => $building]);
            }
        }


        $allBuildings = Building::all();

        return (new View())->render('site.workspace',['allBuildings' => $allBuildings]);
    }


}