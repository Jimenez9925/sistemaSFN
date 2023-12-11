<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class usuariospermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //operaciones sobre la tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //operaciones sobre la tabla levels
            'ver-level',
            'crear-level',
            'editar-level',
            'borrar-level',
            //operaciones sobre la tabla marca
            'ver-marca',
            'crear-marca',
            'editar-marca',
            'borrar-marca',
            //operaciones sobre la tabla modelo
            'ver-modelo',
            'crear-modelo',
            'editar-modelo',
            'borrar-modelo',
            //operaciones sobre la tabla estado
            'ver-estado',
            'crear-estado',
            'editar-estado',
            'borrar-estado',
            //operaciones sobre la tabla categoria
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',
            //operaciones sobre la tabla trabajadores
            'ver-trabajador',
            'crear-trabajador',
            'editar-trabajador',
            'borrar-trabajador',
            //operaciones sobre la tabla area
            'ver-area',
            'crear-area',
            'editar-area',
            'borrar-area',


            //operaciones sobre la tabla catalago
            'ver-catalogo',
            'crear-catalogo',
            'editar-catalogo',
            'borrar-catalogo',
            //operaciones sobre la tabla telefonos
            'ver-telefono',
            'crear-telefono',
            'editar-telefono',
            'borrar-telefono',
            //operaciones sobre la tabla emails
            'ver-email',
            'crear-email',
            'editar-email',
            'borrar-email',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
