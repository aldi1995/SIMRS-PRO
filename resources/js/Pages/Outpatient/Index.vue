<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard } from 'vuetify/components'

const queue = [
  'RM001 — Ahmad Fauzi',
  'RM002 — Siti Rahma'
]
</script>

<template>
  <Head title="Rawat Jalan" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">
      Rawat Jalan (Antrian Poli)
    </h2>

    <v-card class="glass-panel pa-4">
      <ul>
        <li v-for="q in queue" :key="q">{{ q }}</li>
      </ul>
    </v-card>

  </AppLayout>
</template>
