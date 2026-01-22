<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard, VChip } from 'vuetify/components'

const beds = [
  { room: 'VIP-01', patient: 'Ahmad Fauzi', status: 'Terisi' },
  { room: 'VIP-02', patient: '-', status: 'Kosong' }
]
</script>

<template>
  <Head title="Rawat Inap" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">
      Rawat Inap & Bed Management
    </h2>

    <v-card class="glass-panel pa-4">
      <div v-for="b in beds" :key="b.room" class="d-flex justify-space-between mb-2">
        <span>{{ b.room }} — {{ b.patient }}</span>
        <v-chip color="primary">{{ b.status }}</v-chip>
      </div>
    </v-card>

  </AppLayout>
</template>
