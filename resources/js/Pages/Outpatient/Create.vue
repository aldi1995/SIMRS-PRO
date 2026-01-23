<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  patient: '',
  clinic: '',
  doctor: '',
  notes: ''
})

const submit = () => alert('Rawat Jalan submit')
</script>

<template>
  <Head title="Rawat Jalan" />

  <AppLayout>
    <h1 class="page-title mb-4">Registrasi Rawat Jalan</h1>

    <v-card class="glass-card pa-6">
      <v-form @submit.prevent="submit">

        <v-text-field label="Nama Pasien" v-model="form.patient" />
        <v-text-field label="Poli / Klinik" v-model="form.clinic" />
        <v-text-field label="Dokter" v-model="form.doctor" />
        <v-textarea label="Catatan" v-model="form.notes" />

        <div class="d-flex justify-end mt-4">
          <v-btn color="primary" type="submit">Daftar</v-btn>
        </div>

      </v-form>
    </v-card>
  </AppLayout>
</template>
