<script setup>
defineProps({ site: Object })
</script>

<template>
  <article class="rounded-xl p-6 flex flex-col gap-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors">
    <img :src="site.ico" :alt="site.site" class="h-16 w-16 object-contain" />
    <h2 class="text-xl font-semibold">{{ site.site }}</h2>
    <p class="text-gray-600 dark:text-gray-400">{{ site.description }}</p>
    <a :href="site.lien" target="_blank" class="mt-auto text-blue-600 dark:text-blue-400 hover:underline">
      Visit website
    </a>
  </article>
</template>
