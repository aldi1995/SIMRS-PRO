<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  patient: '',
  triage: '',
  complaint: '',
  doctor: ''
})

const submit = () => alert('IGD submit')
</script>

<template>
  <Head title="Pasien IGD" />

  <AppLayout>
    <h1 class="page-title mb-4">Registrasi IGD</h1>

    <v-card class="glass-card pa-6">
      <v-form @submit.prevent="submit">

        <v-text-field label="Nama Pasien" v-model="form.patient" />

        <v-select
          label="Tingkat Triage"
          :items="['Merah (Kritis)','Kuning (Sedang)','Hijau (Ringan)']"
          v-model="form.triage"
        />

        <v-textarea label="Keluhan" v-model="form.complaint" />

        <v-text-field label="Dokter Jaga" v-model="form.doctor" />

        <div class="d-flex justify-end mt-4">
          <v-btn color="primary" type="submit">Simpan</v-btn>
        </div>

      </v-form>
    </v-card>
  </AppLayout>
</template>
