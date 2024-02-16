<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KartupasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // KARTU PASIEN
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2302000000001',
            'nama' => 'Annisa Baizan',
            'no_iden' => '1234567890123456',
            'tgl_lhr' => '2001-07-04',
            'umur' => '22',
            'jk' => 2,
            'suku' => 'Indonesia',
            'pekerjaan' => 'PPPK',
            'hub' => 'Ibu',
            'no_hp' => '09876543212',
            'no_tlpn' => '123456789098',
            'alamat' => 'Jalan Darmapala No.3782 RT.50 RW.15 Kel.Bukit Lama Kec.Ilir Barat 1 Palembang Sumatera Selatan 30139',
            'created_at' =>'2023-10-05 07:16:48',
            'updated_at' => '2023-10-05 07:16:48'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2201000000002',
            'nama' => 'Baizan Annisa',
            'no_iden' => '6543210987654321',
            'tgl_lhr' => '1997-10-24',
            'umur' => '25',
            'jk' => 1,
            'suku' => 'Amerika',
            'pekerjaan' => 'PNS',
            'hub' => 'Ayah',
            'no_hp' => '21234567890',
            'no_tlpn' => '890987654321',
            'alamat' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, tempore, quod in optio iure culpa dolores',
            'created_at' =>'2022-11-25 07:00:00',
            'updated_at' => '2022-11-25 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2102000000003',
            'nama' => 'Annisut',
            'no_iden' => '5678905432156784',
            'tgl_lhr' => '2008-04-16',
            'umur' => '15',
            'jk' => 2,
            'suku' => 'Korea',
            'pekerjaan' => 'Swata',
            'hub' => 'Kakak',
            'no_hp' => '345678945671',
            'no_tlpn' => '109283647854',
            'alamat' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, tempore, quod in optio iure culpa dolores',
            'created_at' =>'2021-03-06 07:00:00',
            'updated_at' => '2021-03-06 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2302000000004',
            'nama' => 'Lorem ipsum',
            'no_iden' => '9827384019283743',
            'tgl_lhr' => '1994-11-04',
            'umur' => '29',
            'jk' => 2,
            'suku' => 'vietnam',
            'pekerjaan' => 'Buruh',
            'hub' => 'kakek',
            'no_hp' => '873264019283',
            'no_tlpn' => '817264718391',
            'alamat' => 'Est, nulla consequuntur asperiores modi, exercitationem autem sequi necessitatibus atque quisquam temporibus',
            'created_at' =>'2023-09-15 07:16:48',
            'updated_at' => '2023-09-15 07:16:48'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2201000000005',
            'nama' => 'dolor sit amet',
            'no_iden' => '836470923748576',
            'tgl_lhr' => '1988-06-05',
            'umur' => '35',
            'jk' => 1,
            'suku' => 'Filiphina',
            'pekerjaan' => 'guru',
            'hub' => 'nenek',
            'no_hp' => '873461920374',
            'no_tlpn' => '640192837462',
            'alamat' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, tempore, quod in optio iure culpa dolores',
            'created_at' =>'2022-05-13 07:00:00',
            'updated_at' => '2022-05-13 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2102000000006',
            'nama' => 'consectetur adipisicing',
            'no_iden' => '2637491027346573',
            'tgl_lhr' => '2002-02-21',
            'umur' => '21',
            'jk' => 2,
            'suku' => 'Mexico',
            'pekerjaan' => 'Penari',
            'hub' => 'Paman',
            'no_hp' => '736291820394',
            'no_tlpn' => '01923748501',
            'alamat' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, tempore, quod in optio iure culpa dolores',
            'created_at' =>'2021-09-27 07:00:00',
            'updated_at' => '2021-09-27 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2302000000007',
            'nama' => 'elit. Necessitatibus',
            'no_iden' => '453093847129374',
            'tgl_lhr' => '2001-08-14',
            'umur' => '22',
            'jk' => 2,
            'suku' => 'Indonesia',
            'pekerjaan' => 'PPPK',
            'hub' => 'Ibu',
            'no_hp' => '091273846109',
            'no_tlpn' => '736281920374',
            'alamat' => 'nobis exercitationem pariatur eius sed expedita molestias recusandae aperiam nesciunt placeat magni architecto illum eveniet.',
            'created_at' =>'2023-10-05 07:16:48',
            'updated_at' => '2023-10-05 07:16:48'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2201000000008',
            'nama' => 'quaerat assumenda',
            'no_iden' => '731930284561',
            'tgl_lhr' => '1997-10-24',
            'umur' => '25',
            'jk' => 1,
            'suku' => 'Amerika',
            'pekerjaan' => 'PNS',
            'hub' => 'Ayah',
            'no_hp' => '291036475812',
            'no_tlpn' => '401928374651',
            'alamat' => 'dolore officia eius molestias facere nam reiciendis sed amet quis eos doloribus, vero odio nisi mollitia autem',
            'created_at' =>'2022-11-25 07:00:00',
            'updated_at' => '2022-11-25 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2102000000009',
            'nama' => 'corrupti quia',
            'no_iden' => '9483201946573829',
            'tgl_lhr' => '2008-04-16',
            'umur' => '15',
            'jk' => 2,
            'suku' => 'Korea',
            'pekerjaan' => 'Swata',
            'hub' => 'Kakak',
            'no_hp' => '093627485102',
            'no_tlpn' => '564102938472',
            'alamat' => 'excepturi dolorum soluta possimus odit quae molestiae iure dicta! Repudiandae laborum minima ex',
            'created_at' =>'2021-03-06 07:00:00',
            'updated_at' => '2021-03-06 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2302000000010',
            'nama' => 'tempora vel nihil',
            'no_iden' => '09364718293475612',
            'tgl_lhr' => '1994-11-04',
            'umur' => '29',
            'jk' => 2,
            'suku' => 'vietnam',
            'pekerjaan' => 'Buruh',
            'hub' => 'kakek',
            'no_hp' => '037481928465',
            'no_tlpn' => '872301946573',
            'alamat' => 'optio incidunt cupiditate autem unde maxime aliquam perspiciatis eligendi quae facilis animi fuga',
            'created_at' =>'2023-09-15 07:16:48',
            'updated_at' => '2023-09-15 07:16:48'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2201000000011',
            'nama' => 'ratione iusto',
            'no_iden' => '6512847365098765',
            'tgl_lhr' => '1988-06-05',
            'umur' => '35',
            'jk' => 1,
            'suku' => 'Filiphina',
            'pekerjaan' => 'guru',
            'hub' => 'nenek',
            'no_hp' => '561287450923',
            'no_tlpn' => '673491027364',
            'alamat' => 'at neque cupiditate dignissimos vitae ex consequuntur consectetur maxime non',
            'created_at' =>'2022-05-13 07:00:00',
            'updated_at' => '2022-05-13 07:00:00'
        ]);
        DB::table('kartupasiens')->insert([
            'no_kartu'=> '2102000000012',
            'nama' => 'eligendi! Ipsam',
            'no_iden' => '0912637451847392',
            'tgl_lhr' => '2002-02-21',
            'umur' => '21',
            'jk' => 2,
            'suku' => 'Mexico',
            'pekerjaan' => 'Penari',
            'hub' => 'Paman',
            'no_hp' => '097354173648',
            'no_tlpn' => '87243019783',
            'alamat' => 'Doloremque nostrum tempora illo, unde perferendis, quibusdam adipisci rerum aliquid voluptate dolore officia eius',
            'created_at' =>'2021-09-27 07:00:00',
            'updated_at' => '2021-09-27 07:00:00'
        ]);
    }
}
