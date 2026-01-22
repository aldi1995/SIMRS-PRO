<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard, VTextarea, VBtn } from 'vuetify/components'
</script>

<template>
  <Head title="Rekam Medis SOAP" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">Rekam Medis SOAP</h2>

    <v-card class="glass-panel pa-4 mb-4">
      <v-textarea label="Subjective (Keluhan)" variant="outlined" />
      <v-textarea label="Objective (Pemeriksaan)" variant="outlined" />
      <v-textarea label="Assessment (Diagnosis)" variant="outlined" />
      <v-textarea label="Plan (Rencana)" variant="outlined" />
    </v-card>

    <v-btn color="primary">Simpan Rekam Medis</v-btn>

  </AppLayout>
</template>
