<script setup>
defineProps({ sites: Array })
</script>

<template>
  <div style="border:2px solid green">
    Vue is mounted
    <pre>{{ sites }}</pre>
  </div>
</template>

<script>
import SiteCard from './SiteCard.vue'
export default { components: { SiteCard } }
</script>
