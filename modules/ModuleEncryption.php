<?php

include_once "../dbcon/Connection.php";

class ModuleEncryption extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getEncryptionVars()
    {
        $sql = 'SELECT * FROM encryption';

        $stmt = $this->sql_conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = array();

        if ($stmt->rowCount() == 0)
        return $data;

        foreach ($result as $row) {
            $data = $row;
        }

        return $data;

    }

    function encryptUserPassword($password)
    {
        $encryption = $this->getEncryptionVars();
        openssl_cipher_iv_length($encryption['CipherMethod']);
        $encryptedPassword = openssl_encrypt(
            $password,
            $encryption['CipherMethod'],
            $encryption['EncryptionKey'],
            0,
            $encryption['EncryptionVector']
        );

        return $encryptedPassword;
    }
}
