<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard } from 'vuetify/components'

const actions = [
  'Nebulizer',
  'Infus',
  'EKG',
  'Jahit Luka'
]
</script>

<template>
  <Head title="Tindakan Medis" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">
      Tindakan Medis
    </h2>

    <v-card class="glass-panel pa-4">
      <ul>
        <li v-for="a in actions" :key="a">{{ a }}</li>
      </ul>
    </v-card>

  </AppLayout>
</template>
