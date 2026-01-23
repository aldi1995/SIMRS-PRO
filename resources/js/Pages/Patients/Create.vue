<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  nik: '',
  birth_date: '',
  gender: '',
  phone: '',
  address: ''
})

const submit = () => alert('Submit pasien (dummy)')
</script>

<template>
  <Head title="Tambah Pasien" />

  <AppLayout>
    <h1 class="page-title mb-4">Tambah Pasien</h1>

    <v-card class="glass-card pa-6">
      <v-form @submit.prevent="submit">

        <v-row dense>
          <v-col cols="12" md="6">
            <v-text-field label="Nama Pasien" v-model="form.name" required />
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field label="NIK" v-model="form.nik" required />
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field label="Tanggal Lahir" type="date" v-model="form.birth_date" />
          </v-col>

          <v-col cols="12" md="6">
            <v-select label="Jenis Kelamin" :items="['Laki-laki','Perempuan']" v-model="form.gender" />
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field label="No HP" v-model="form.phone" />
          </v-col>

          <v-col cols="12">
            <v-textarea label="Alamat" v-model="form.address" />
          </v-col>
        </v-row>

        <div class="d-flex justify-end mt-4">
          <v-btn type="submit" color="primary">Simpan Pasien</v-btn>
        </div>

      </v-form>
    </v-card>
  </AppLayout>
</template>
