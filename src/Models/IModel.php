<?php
/**
 * Interface for all Models
 */

namespace Models;

interface IModel{
    public function getAllData() : array;
    public function getRecordById() : array;
}