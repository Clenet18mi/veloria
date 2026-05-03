<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="min-h-screen bg-[var(--background)]">
    <!-- Header -->
    <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6">
      <div class="text-xl font-serif text-[var(--terracotta)]">VELORIA</div>
      <nav class="flex space-x-6">
        <Link href="/front-desk" class="text-slate-700 hover:text-[var(--terracotta)]">Front Desk</Link>
        <Link href="/arrivals" class="text-slate-700 hover:text-[var(--terracotta)]">Arrivals/Departures</Link>
        <Link href="/reservations" class="text-slate-700 hover:text-[var(--terracotta)]">Reservations</Link>
      </nav>
      <div class="text-sm text-slate-500">Front Desk Mode</div>
    </header>
    
    <main class="p-6">
      <slot />
    </main>
  </div>
</template>
