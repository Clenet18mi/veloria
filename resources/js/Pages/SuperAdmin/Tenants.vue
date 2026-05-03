<script setup lang="ts">
import DirectorLayout from '@/layouts/DirectorLayout.vue'
defineProps<{ tenants: any[] }>()
</script>

<template>
  <DirectorLayout>
    <h1 class="text-3xl font-serif mb-6">Super Admin - Tenants</h1>
    <div class="bg-white rounded-lg border border-slate-200">
      <table class="w-full text-left">
        <thead class="border-b">
          <tr>
            <th class="p-4">Name</th>
            <th class="p-4">Slug</th>
            <th class="p-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tenant in tenants" :key="tenant.id" class="border-b">
            <td class="p-4">{{ tenant.name }}</td>
            <td class="p-4">{{ tenant.slug }}</td>
            <td class="p-4">
              <button class="text-[var(--terracotta)] underline">Impersonate</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </DirectorLayout>
</template>
