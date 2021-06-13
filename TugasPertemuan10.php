<?php

class User
{
    public $name;
    public $email;
    public $date;
    
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->date = $data['date'];
    }
}

class UserRequest
{
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
        'date' => 'string'
    ];

    public static function validate($data){
        foreach (static::$rules as $property => $type){
            if (gettype($data[$property]) != $type){
                throw new \Exception("User property {$property} must be of type {$type}" );
            }
        }
    }
}

class Json{
    public static function from ($data){
        return json_encode($data);
    }
}

class Age{
    public static function now($data){
        $date = new DateTime($data['date']);
        $today = new Datetime(date('d.m.y'));
        return [
            'year' => $today->diff($date)->y,
            'month' => $today->diff($date)->m,
            'day' => $today->diff($date)->d,
        ];
    }
}

$data = [
    'name' => 'MuhammadSyafiqAkmal', 
    'email' => 'akmal.indo345@gmail.com',
    'date' => '06.04.2000'
];

UserRequest::validate($data);
$user = new User($data);
print_r(Json::from($user));
echo '<br>';
print_r(Age::now($data));

?>