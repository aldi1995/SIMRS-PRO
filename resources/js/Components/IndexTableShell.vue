<script setup>
defineProps({
  title: String,
  subtitle: String
})
</script>

<template>
  <v-card class="glass-card pa-6">

    <div class="header mb-4">
      <div>
        <h2 class="text-h6 font-weight-bold">{{ title }}</h2>
        <p class="text-muted">{{ subtitle }}</p>
      </div>

      <div class="actions">
        <slot name="toolbar" />
      </div>
    </div>

    <slot />

  </v-card>
</template>

<style scoped>
.glass-card {
  background: rgba(15, 23, 42, 0.95);
  border: 1px solid rgba(255,255,255,0.08);
  backdrop-filter: blur(14px);
  border-radius: 16px;
  color: white;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.text-muted {
  color: #94a3b8;
}
</style>
