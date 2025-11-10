<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import UserProjects from '@/Components/UserProjects.vue';
import UserTasks from '@/Components/UserTasks.vue';

const { props } = usePage()
const user = props.auth.user
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Bienvenido, {{ user.name }}
        </h2>
        <p class="text-sm text-gray-500"> {{ user.email }} </p>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-semibold mb-4 text-gray-700">
            ¡Hola {{ user.name }}! 👋
          </h3>
          <p class="text-gray-600 mb-6">
            Bienvenido a tu panel principal. Desde aquí podrás gestionar tus proyectos y tareas.
          </p>

         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <UserProjects :user="user" />
            <UserTasks :user="user" />

            <div class="border rounded-lg p-4 hover:shadow-lg transition">
              <h4 class="font-semibold text-gray-800 mb-2">Usuarios</h4>
              <p class="text-gray-500 text-sm">Gestiona los miembros de tu equipo.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

