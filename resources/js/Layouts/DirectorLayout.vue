<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="min-h-screen bg-[var(--background)] flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">
      <div class="p-6 text-2xl font-serif text-[var(--amber)]">VELORIA</div>
      <nav class="flex-1 px-4 space-y-2">
        <Link href="/dashboard" class="block py-2 px-4 rounded hover:bg-slate-800">Dashboard</Link>
        <Link href="/reservations" class="block py-2 px-4 rounded hover:bg-slate-800">Reservations</Link>
        <Link href="/reports" class="block py-2 px-4 rounded hover:bg-slate-800">Reports</Link>
        <Link href="/settings" class="block py-2 px-4 rounded hover:bg-slate-800">Settings</Link>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
      <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8">
        <h1 class="text-lg font-medium text-slate-800">Overview</h1>
        <div class="text-sm text-slate-500">Director Mode</div>
      </header>
      <div class="p-8">
        <slot />
      </div>
    </main>
  </div>
</template>
