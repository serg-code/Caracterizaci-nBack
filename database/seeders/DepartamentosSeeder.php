<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create( [
            'codigo_dane'=>'05',
            'nombre'=>'ANTIOQUIA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'08',
            'nombre'=>'ATLÁNTICO'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'11',
            'nombre'=>'BOGOTÁ D. C.'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'13',
            'nombre'=>'BOLÍVAR'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'15',
            'nombre'=>'BOYACÁ'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'17',
            'nombre'=>'CALDAS'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'18',
            'nombre'=>'CAQUETÁ'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'19',
            'nombre'=>'CAUCA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'20',
            'nombre'=>'CESAR'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'23',
            'nombre'=>'CÓRDOBA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'25',
            'nombre'=>'CUNDINAMARCA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'27',
            'nombre'=>'CHOCÓ'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'41',
            'nombre'=>'HUILA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'44',
            'nombre'=>'LA GUAJIRA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'47',
            'nombre'=>'MAGDALENA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'50',
            'nombre'=>'META'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'52',
            'nombre'=>'NARIÑO'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'54',
            'nombre'=>'NORTE DE SANTANDER'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'63',
            'nombre'=>'QUINDÍO'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'66',
            'nombre'=>'RISARALDA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'68',
            'nombre'=>'SANTANDER'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'70',
            'nombre'=>'SUCRE'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'73',
            'nombre'=>'TOLIMA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'76',
            'nombre'=>'VALLE DEL CAUCA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'81',
            'nombre'=>'ARAUCA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'85',
            'nombre'=>'CASANARE'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'86',
            'nombre'=>'PUTUMAYO'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'88',
            'nombre'=>'ARCHIPIÉLAGO DE SAN ANDRÉS PROVIDENCIA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'91',
            'nombre'=>'AMAZONAS'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'94',
            'nombre'=>'GUAINÍA'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'95',
            'nombre'=>'GUAVIARE'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'97',
            'nombre'=>'VAUPÉS'
            ] );
                        
            Departamento::create( [
            'codigo_dane'=>'99',
            'nombre'=>'VICHADA'
            ] );
    }
}
