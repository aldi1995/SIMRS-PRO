<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = ref({
  patient: '',
  doctor: '',
  room: '',
  class: '',
  admission_date: '',
  diagnosis: '',
  estimated_days: '',
  notes: ''
})

const submit = () => {
  console.log('Submitting inpatient data:', form.value)
  alert('Dummy submit — backend belum aktif')
}
</script>

<template>
  <Head title="Tambah Rawat Inap" />

  <AppLayout>

    <!-- HEADER -->
    <div class="page-header mb-6">
      <h1 class="page-title">Registrasi Rawat Inap</h1>
      <p class="page-subtitle">Input data pasien rawat inap</p>
    </div>

    <v-row dense>

      <!-- DATA PASIEN -->
      <v-col cols="12" md="6">
        <v-card class="glass-card pa-5">

          <h3 class="section-title mb-4">Data Pasien</h3>

          <v-text-field
            label="Cari Pasien"
            placeholder="Nama / RM / NIK"
            variant="outlined"
            v-model="form.patient"
          />

          <v-text-field
            label="Dokter Penanggung Jawab"
            placeholder="Nama Dokter"
            variant="outlined"
            v-model="form.doctor"
          />

          <v-text-field
            label="Diagnosa Awal"
            placeholder="Contoh: Pneumonia"
            variant="outlined"
            v-model="form.diagnosis"
          />

        </v-card>
      </v-col>

      <!-- DATA RUANGAN -->
      <v-col cols="12" md="6">
        <v-card class="glass-card pa-5">

          <h3 class="section-title mb-4">Informasi Ruangan</h3>

          <v-select
            label="Kelas Perawatan"
            :items="['VIP', 'Kelas 1', 'Kelas 2', 'Kelas 3']"
            variant="outlined"
            v-model="form.class"
          />

          <v-text-field
            label="Ruangan / Kamar"
            placeholder="Contoh: VIP-01"
            variant="outlined"
            v-model="form.room"
          />

          <v-text-field
            label="Tanggal Masuk"
            type="date"
            variant="outlined"
            v-model="form.admission_date"
          />

          <v-text-field
            label="Estimasi Lama Inap (hari)"
            type="number"
            variant="outlined"
            v-model="form.estimated_days"
          />

        </v-card>
      </v-col>

      <!-- CATATAN MEDIS -->
      <v-col cols="12">
        <v-card class="glass-card pa-5">

          <h3 class="section-title mb-4">Catatan Tambahan</h3>

          <v-textarea
            label="Catatan Medis"
            rows="4"
            variant="outlined"
            placeholder="Tambahkan catatan penting dokter / perawat"
            v-model="form.notes"
          />

        </v-card>
      </v-col>

      <!-- ACTIONS -->
      <v-col cols="12">
        <div class="d-flex justify-end gap-3">

          <v-btn
            variant="text"
            color="grey"
            @click="router.visit('/inpatient')"
          >
            Batal
          </v-btn>

          <v-btn
            color="primary"
            prepend-icon="mdi-content-save"
            @click="submit"
          >
            Simpan Rawat Inap
          </v-btn>

        </div>
      </v-col>

    </v-row>

  </AppLayout>
</template>

<style scoped>
.page-title {
  font-size: 1.7rem;
  font-weight: 700;
}

.page-subtitle {
  color: #94a3b8;
  margin-top: 4px;
}

.section-title {
  font-weight: 600;
  font-size: 1.1rem;
}

.glass-card {
  background: rgba(15, 23, 42, 0.9);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.06);
  color: white;
}
</style>
