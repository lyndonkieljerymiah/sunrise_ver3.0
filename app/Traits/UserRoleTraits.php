<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/4/2017
 * Time: 11:43 AM
 */

namespace App\Traits;


trait UserRoleTraits
{
    protected $fieldName;

    public function hasAnyRole($roles)
    {

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }
        else {
            return $this->hasRole($role);
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where($this->roleName(), $role)->first()) {
            return true;
        }

        return false;
    }

    public function isAdmin()
    {
        if ($this->roles()->where($this->roleName(), 'admin')->first()) {
            return true;
        }

        return false;
    }

    public function addNewRole($roles) {
        if($this->roles()->count() > 0) {
            $this->roles()->sync($roles);
        }
        else {
            if(is_array($roles)) {
                foreach($roles as $role) {
                    $this->roles()->attach($role);
                }
            }
            else {
                $this->roles()->attach($roles);
            }
        }
    }


    public function isPasswordMatch($attempt)
    {
        if (Hash::check($attempt, $this->getAuthPassword())) {
            return true;
        }
        return false;
    }

    public function getRoleToString()
    {
        $roles = $this->roles()->get();
        $strRoleName = "";

        foreach ($roles as $role) {
            $strRoleName = $role->name . ",";
        }

        return substr($strRoleName, 0, strlen($strRoleName)-1);
    }

    protected function roleName() {
        return "name";
    }
}