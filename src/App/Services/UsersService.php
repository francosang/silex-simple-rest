<?php

namespace App\Services;

class UsersService extends BaseService
{

    public function getOne($id)
    {
        return $this->db->fetchAssoc("SELECT * FROM users WHERE id=?", [(int) $id]);
    }

    public function getAll()
    {
        return $this->db->fetchAll("SELECT id, name, email FROM users");
    }

    function save($user)
    {
        $this->db->insert("users", $user);
        return $this->db->lastInsertId();
    }

    function update($id, $user)
    {
        return $this->db->update('users', $user, ['id' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("users", array("id" => $id));
    }

}
