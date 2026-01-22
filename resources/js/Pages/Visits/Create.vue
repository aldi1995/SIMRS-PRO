<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard, VSelect, VBtn, VRow, VCol } from 'vuetify/components'

const patients = ['RM001 — Ahmad Fauzi', 'RM002 — Siti Rahma']
const services = ['Rawat Jalan', 'IGD', 'Rawat Inap']
const clinics = ['Poli Umum', 'Poli Anak']
const doctors = ['dr. Andi', 'dr. Rina']
const payers = ['Umum', 'BPJS', 'Asuransi']
</script>

<template>
  <Head title="Registrasi Kunjungan" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">Registrasi Kunjungan</h2>

    <v-row dense>

      <v-col cols="12" md="5">
        <v-card class="glass-panel pa-4">
          <h4 class="panel-title mb-3">Pasien</h4>
          <v-select :items="patients" label="Cari Pasien" variant="outlined" />
        </v-card>
      </v-col>

      <v-col cols="12" md="7">
        <v-card class="glass-panel pa-4">
          <h4 class="panel-title mb-3">Detail Layanan</h4>

          <v-select :items="services" label="Jenis Layanan" variant="outlined" />
          <v-select :items="clinics" label="Poli / Unit" variant="outlined" />
          <v-select :items="doctors" label="Dokter" variant="outlined" />
          <v-select :items="payers" label="Penjamin" variant="outlined" />
        </v-card>
      </v-col>

      <v-col cols="12">
        <v-card class="glass-panel pa-4 d-flex justify-end">
          <v-btn color="primary" size="large">Daftarkan</v-btn>
        </v-card>
      </v-col>

    </v-row>

  </AppLayout>
</template>
