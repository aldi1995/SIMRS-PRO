<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  patient: '',
  rm: '',
  doctor: '',
  complaint: '',
  vital_signs: '',
  physical_exam: '',
  diagnosis: '',
  treatment: '',
  notes: ''
})

const submit = () => {
  alert('Submit rekam medis (dummy)')
}
</script>

<template>
  <Head title="Tambah Rekam Medis" />

  <AppLayout>

    <!-- HEADER -->
    <div class="page-header mb-6">
      <div>
        <h1 class="page-title">Tambah Rekam Medis</h1>
        <p class="text-muted">Input rekam medis pasien berdasarkan pemeriksaan dokter</p>
      </div>
    </div>

    <v-card class="glass-card pa-6">

      <v-form @submit.prevent="submit">

        <v-row dense>

          <!-- PASIEN -->
          <v-col cols="12" md="6">
            <v-text-field
              label="Nama Pasien"
              v-model="form.patient"
              required
            />
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field
              label="No Rekam Medis (RM)"
              v-model="form.rm"
              required
            />
          </v-col>

          <!-- DOKTER -->
          <v-col cols="12" md="6">
            <v-text-field
              label="Dokter Pemeriksa"
              v-model="form.doctor"
              required
            />
          </v-col>

          <!-- SUBJECTIVE -->
          <v-col cols="12">
            <v-textarea
              label="Keluhan Utama (Subjective)"
              v-model="form.complaint"
              rows="3"
            />
          </v-col>

          <!-- OBJECTIVE -->
          <v-col cols="12">
            <v-textarea
              label="Tanda Vital & Pemeriksaan Fisik (Objective)"
              v-model="form.vital_signs"
              rows="3"
            />
          </v-col>

          <v-col cols="12">
            <v-textarea
              label="Hasil Pemeriksaan Tambahan"
              v-model="form.physical_exam"
              rows="3"
            />
          </v-col>

          <!-- ASSESSMENT -->
          <v-col cols="12">
            <v-textarea
              label="Diagnosa (Assessment)"
              v-model="form.diagnosis"
              rows="3"
            />
          </v-col>

          <!-- PLAN -->
          <v-col cols="12">
            <v-textarea
              label="Rencana Tindakan & Terapi (Plan)"
              v-model="form.treatment"
              rows="3"
            />
          </v-col>

          <!-- NOTES -->
          <v-col cols="12">
            <v-textarea
              label="Catatan Tambahan"
              v-model="form.notes"
              rows="3"
            />
          </v-col>

        </v-row>

        <!-- ACTION -->
        <div class="d-flex justify-end mt-6 gap-3">
          <v-btn variant="text">
            Batal
          </v-btn>

          <v-btn type="submit" color="primary" prepend-icon="mdi-content-save">
            Simpan Rekam Medis
          </v-btn>
        </div>

      </v-form>

    </v-card>

  </AppLayout>
</template>

<style scoped>
.page-title {
  font-size: 26px;
  font-weight: 900;
}
</style>
