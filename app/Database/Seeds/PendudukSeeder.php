<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        // for($i=0; $i<=10; $i++){
        //     $nik = $faker->nik;
        //     $data_penduduk = [
        //         'nik' => $nik,
        //         'nkk' => $faker->nik,
        //         'nama' => $faker->name($gender = 'female'),
        //         'jenis_kelamin' => 'perempuan',
        //         'tempat_lahir' => $faker->city,
        //         'tgl_lahir' => $faker->date('Y_m_d'),
        //         'agama' => 'kristen',
        //         'pendidikan' => 'sarjana',
        //         'jenis_pekerjaan' => 'wirausaha',
        //         'status_perkawinan' => 'belum kawin',
        //         'status_dalam_keluarga' => 'anak',
        //         'kewarganegaraan' => 'wni',
        //         'no_paspor' => '',
        //         'no_kitas' => '',
        //         'nama_ayah' => $faker->name($gender = 'male'),
        //         'nama_ibu' => $faker->name($gender = 'female'),
        //         'rt' => $faker->randomNumber(1, true),
        //         'rw' => $faker->randomNumber(1, true),
        //         'desa' => 'kembuan',
        //         'kecamatan' => 'Tondano Utara',
        //         'kabupaten' => 'Minahasa',
        //         'provinsi' => 'Sulawesi Utara',
        //         'kode_pos' => '17916',



                

        //     ];
            $data_user = [
                // 'username' => $nik,
                // 'password' =>password_hash($nik, PASSWORD_BCRYPT),
                // 'email' => '',
                // 'role_id' => '3'

                // [
                //     'username' => 'super admin',
                //     'password' => password_hash('12345', PASSWORD_BCRYPT),
                //     'role_id' => '1',
                // ],
                // [
                    'username' => 'admin',
                    'password' => password_hash('12345', PASSWORD_BCRYPT),
                    'role_id' => '2',
                // ],
                // [
                //     'username' => '123456789',
                //     'password' => password_hash('12345', PASSWORD_BCRYPT),
                //     'role_id' => '3',
                // ]
            ];
            // $this->db->table('tb_penduduk')->insert($data_penduduk);
            $this->db->table('tb_users')->insert($data_user);
        // }
    }
}
