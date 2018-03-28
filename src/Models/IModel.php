<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 27.03.18
 * Time: 15:44
 */

namespace Models;

interface IModel{
    public function getAllData() : array;
    public function getRecordById() : array;
}