<script setup lang="ts">
defineProps<{
  variant?: 'primary' | 'secondary' | 'outline' | 'ghost'
  size?: 'sm' | 'md' | 'lg'
}>()

const variants = {
  primary: 'bg-[var(--terracotta)] text-white hover:bg-[var(--terracotta)]/90',
  secondary: 'bg-[var(--amber)] text-white hover:bg-[var(--amber)]/90',
  outline: 'border border-[var(--terracotta)] text-[var(--terracotta)] hover:bg-[var(--terracotta)]/10',
  ghost: 'hover:bg-slate-100 text-slate-700'
}

const sizes = {
  sm: 'px-3 py-1.5 text-sm',
  md: 'px-4 py-2',
  lg: 'px-6 py-3 text-lg'
}
</script>

<template>
  <button :class="['rounded-md transition-all duration-200 font-medium', variants[variant ?? 'primary'], sizes[size ?? 'md']]">
    <slot />
  </button>
</template>
