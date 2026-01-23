<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Registrasi Kunjungan" />

  <AppLayout>

    <div class="page-header">
      <h1>Registrasi Kunjungan</h1>
      <p class="text-muted">Input kunjungan pasien rawat jalan / IGD / MCU</p>
    </div>

    <v-row dense class="mt-6">

      <!-- PASIEN -->
      <v-col cols="12" md="5">
        <v-card class="glass-card pa-4">

          <h3 class="section-title">Pasien</h3>

          <v-text-field
            label="Cari Pasien (RM / Nama / NIK)"
            prepend-inner-icon="mdi-magnify"
            variant="outlined"
          />

          <div class="patient-preview mt-4">
            <strong>Ahmad Fauzi</strong>
            <p>RM001 • Laki-laki • 34 Tahun</p>
            <p>NIK: 3275012345678901</p>
          </div>

        </v-card>
      </v-col>

      <!-- DETAIL KUNJUNGAN -->
      <v-col cols="12" md="7">
        <v-card class="glass-card pa-4">

          <h3 class="section-title">Detail Kunjungan</h3>

          <v-row dense>
            <v-col cols="12" md="6">
              <v-select label="Jenis Layanan" :items="['Rawat Jalan','IGD','Medical Checkup']" />
            </v-col>

            <v-col cols="12" md="6">
              <v-select label="Poli / Unit" :items="['Poli Umum','Interna','Anak','Bedah']" />
            </v-col>

            <v-col cols="12" md="6">
              <v-select label="Dokter" :items="['dr. Andi Wijaya','dr. Rina Kartika']" />
            </v-col>

            <v-col cols="12" md="6">
              <v-select label="Penjamin" :items="['Umum','BPJS','Asuransi']" />
            </v-col>
          </v-row>

        </v-card>
      </v-col>

      <!-- CATATAN -->
      <v-col cols="12">
        <v-card class="glass-card pa-4">

          <h3 class="section-title">Catatan Kunjungan</h3>

          <v-textarea label="Keluhan Utama / Catatan Petugas" rows="3" />

        </v-card>
      </v-col>

      <!-- SUMMARY -->
      <v-col cols="12">
        <v-card class="glass-card pa-4 summary-bar">

          <div>
            <strong>Ringkasan</strong>
            <p>Pasien: Ahmad Fauzi</p>
            <p>Layanan: Rawat Jalan • Poli Interna</p>
            <p>Dokter: dr. Andi Wijaya</p>
          </div>

          <v-btn color="primary" size="large">
            Daftarkan Kunjungan
          </v-btn>

        </v-card>
      </v-col>

    </v-row>

  </AppLayout>
</template>

<style scoped>
.page-header h1 {
  font-size: 28px;
  font-weight: 900;
}

.text-muted {
  color: #94a3b8;
}

.section-title {
  font-size: 16px;
  font-weight: 800;
  margin-bottom: 10px;
}

.glass-card {
  background: rgba(255,255,255,0.06);
  border-radius: 18px;
  border: 1px solid rgba(255,255,255,0.08);
}

.patient-preview {
  background: rgba(255,255,255,0.04);
  padding: 14px;
  border-radius: 14px;
}

.summary-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}
</style>
