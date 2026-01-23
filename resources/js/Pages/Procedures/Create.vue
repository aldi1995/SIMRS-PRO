<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  patient: '',
  procedure: '',
  doctor: '',
  cost: ''
})

const submit = () => alert('Tindakan submit')
</script>

<template>
  <Head title="Tindakan Medis" />

  <AppLayout>
    <h1 class="page-title mb-4">Tambah Tindakan Medis</h1>

    <v-card class="glass-card pa-6">
      <v-form @submit.prevent="submit">

        <v-text-field label="Nama Pasien" v-model="form.patient" />
        <v-text-field label="Nama Tindakan" v-model="form.procedure" />
        <v-text-field label="Dokter" v-model="form.doctor" />
        <v-text-field label="Tarif (Rp)" type="number" v-model="form.cost" />

        <div class="d-flex justify-end mt-4">
          <v-btn color="primary" type="submit">Simpan</v-btn>
        </div>

      </v-form>
    </v-card>
  </AppLayout>
</template>
