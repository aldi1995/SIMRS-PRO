<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

const reports = [
  { title: 'Laporan Kunjungan Pasien', type: 'Harian' },
  { title: 'Laporan Pendapatan RS', type: 'Bulanan' },
  { title: 'Laporan BOR & LOS', type: 'Bulanan' },
  { title: 'Laporan Farmasi', type: 'Mingguan' }
]
</script>

<template>
  <Head title="Laporan RS" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Laporan Rumah Sakit
    </h2>

    <div class="grid-2">
      <v-card
        v-for="report in reports"
        :key="report.title"
        class="glass-panel pa-4 d-flex justify-space-between align-center"
      >
        <div>
          <h3 class="font-weight-bold">{{ report.title }}</h3>
          <p class="muted-text text-caption">{{ report.type }}</p>
        </div>

        <v-btn color="primary" variant="tonal">
          Download
        </v-btn>
      </v-card>
    </div>

  </AppLayout>
</template>

<style scoped>
.grid-2 {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 16px;
}
</style>
