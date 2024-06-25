<?php

namespace models;
include_once __DIR__ . '/Model.php';

class User extends Model
{

    private int $id;

    private string $password;

    private string $email;


}