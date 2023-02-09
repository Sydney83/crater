<template>
  <MenuItem v-slot="{ active }" v-bind="$attrs">
    <button :class="[
    active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
    'group flex items-center px-4 py-2 text-sm font-normal',
  ]" style="width: 100% !important">
    <slot :active="active" />
  </button>
  </MenuItem>
</template>

<script setup>
import { MenuItem } from '@headlessui/vue'
</script>
