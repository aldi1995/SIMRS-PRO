<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const stats = ref([
  { label: 'Pasien Rawat Jalan', value: 320 },
  { label: 'Pasien Rawat Inap', value: 124 },
  { label: 'Pasien IGD', value: 98 }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Statistik Rumah Sakit</h2>
<p class="text-muted mb-4">Ringkasan data operasional</p>

<v-row dense>
<v-col v-for="s in stats" :key="s.label" cols="12" md="4">
<v-card class="glass-card pa-4">
<h3 class="text-muted">{{ s.label }}</h3>
<h1 class="text-primary font-weight-bold">{{ s.value }}</h1>
</v-card>
</v-col>
</v-row>

</v-card>
</AppLayout>
</template>
