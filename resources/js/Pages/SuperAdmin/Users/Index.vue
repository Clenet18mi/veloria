<script setup lang="ts">
import DirectorLayout from '@/Layouts/DirectorLayout.vue'
defineProps<{ users: any[] }>()
</script>

<template>
  <DirectorLayout>
    <h1 class="text-3xl font-serif mb-6">User Management</h1>
    <div class="bg-white rounded-lg border border-slate-200">
      <table class="w-full text-left">
        <thead class="border-b">
          <tr>
            <th class="p-4">Name</th>
            <th class="p-4">Email</th>
            <th class="p-4">Role</th>
            <th class="p-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="border-b">
            <td class="p-4">{{ user.name }}</td>
            <td class="p-4">{{ user.email }}</td>
            <td class="p-4">
                <span v-for="role in user.roles" :key="role.id" class="px-2 py-1 bg-slate-100 rounded text-xs">{{ role.name }}</span>
            </td>
            <td class="p-4">
              <button class="text-blue-600 underline mr-2">Edit</button>
              <button class="text-red-600 underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </DirectorLayout>
</template>
