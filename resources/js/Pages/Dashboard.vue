<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import {
  VRow,
  VCol,
  VCard,
  VIcon,
  VProgressLinear,
  VChip,
  VDivider
} from 'vuetify/components'
</script>

<template>
  <Head title="Dashboard | SIMRS PRO" />

  <AppLayout>

    <!-- HEADER -->
    <div class="d-flex justify-space-between align-center mb-6">
      <div>
        <h2 class="text-h5 font-weight-bold text-white">
          Dashboard Rumah Sakit
        </h2>
        <p class="text-caption text-grey-lighten-1">
          Ringkasan operasional hari ini
        </p>
      </div>

      <v-chip color="primary" variant="tonal">
        LIVE
      </v-chip>
    </div>

    <!-- KPI CARDS -->
    <v-row dense>
      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <div class="d-flex justify-space-between align-center">
            <div>
              <p class="stat-label">Pasien Hari Ini</p>
              <h3 class="stat-value">128</h3>
            </div>
            <v-icon size="32" color="primary">mdi-account-group</v-icon>
          </div>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <div class="d-flex justify-space-between align-center">
            <div>
              <p class="stat-label">Rawat Inap Aktif</p>
              <h3 class="stat-value">42</h3>
            </div>
            <v-icon size="32" color="teal">mdi-bed</v-icon>
          </div>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <div class="d-flex justify-space-between align-center">
            <div>
              <p class="stat-label">Antrian IGD</p>
              <h3 class="stat-value">9</h3>
            </div>
            <v-icon size="32" color="red">mdi-hospital-box</v-icon>
          </div>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <div class="d-flex justify-space-between align-center">
            <div>
              <p class="stat-label">Pendapatan Hari Ini</p>
              <h3 class="stat-value">Rp 87 jt</h3>
            </div>
            <v-icon size="32" color="green">mdi-cash</v-icon>
          </div>
        </v-card>
      </v-col>
    </v-row>

    <!-- SECOND ROW -->
    <v-row class="mt-6">
      <!-- BOR -->
      <v-col cols="12" md="6">
        <v-card class="pa-5 glass-panel">
          <h4 class="panel-title mb-2">
            Bed Occupancy Rate (BOR)
          </h4>

          <v-progress-linear
            model-value="68"
            height="10"
            color="primary"
            rounded
          />

          <div class="d-flex justify-space-between mt-2 text-caption">
            <span>Terpakai: 68%</span>
            <span>Target ideal: 60–85%</span>
          </div>
        </v-card>
      </v-col>

      <!-- FARMASI STATUS -->
      <v-col cols="12" md="6">
        <v-card class="pa-5 glass-panel">
          <h4 class="panel-title mb-3">
            Status Farmasi
          </h4>

          <div class="d-flex justify-space-between mb-2">
            <span>Stok Aman</span>
            <v-chip color="green" size="small">OK</v-chip>
          </div>

          <div class="d-flex justify-space-between mb-2">
            <span>Obat Menipis</span>
            <v-chip color="orange" size="small">12 Item</v-chip>
          </div>

          <div class="d-flex justify-space-between">
            <span>Obat Habis</span>
            <v-chip color="red" size="small">3 Item</v-chip>
          </div>
        </v-card>
      </v-col>
    </v-row>

    <!-- THIRD ROW -->
    <v-row class="mt-6">
      <!-- AKTIVITAS -->
      <v-col cols="12" md="7">
        <v-card class="pa-5 glass-panel">
          <h4 class="panel-title mb-3">
            Aktivitas Terbaru
          </h4>

          <ul class="activity-list">
            <li>✔ Pasien baru terdaftar — 5 menit lalu</li>
            <li>✔ Dokter update rekam medis — 18 menit lalu</li>
            <li>✔ Resep diproses farmasi — 35 menit lalu</li>
            <li>✔ Klaim BPJS dikirim — 1 jam lalu</li>
            <li>✔ Pembayaran kasir diterima — 2 jam lalu</li>
          </ul>
        </v-card>
      </v-col>

      <!-- QUICK STATUS -->
      <v-col cols="12" md="5">
        <v-card class="pa-5 glass-panel">
          <h4 class="panel-title mb-3">
            Status Unit Hari Ini
          </h4>

          <div class="status-row">
            <span>Rawat Jalan</span>
            <v-chip color="primary" size="small">Aktif</v-chip>
          </div>

          <div class="status-row">
            <span>IGD</span>
            <v-chip color="red" size="small">Siaga</v-chip>
          </div>

          <div class="status-row">
            <span>Laboratorium</span>
            <v-chip color="teal" size="small">Operasional</v-chip>
          </div>

          <div class="status-row">
            <span>Radiologi</span>
            <v-chip color="indigo" size="small">Ready</v-chip>
          </div>
        </v-card>
      </v-col>
    </v-row>

  </AppLayout>
</template>

<style scoped>
.stat-card {
  padding: 18px;
  border-radius: 18px;
  background: rgba(255, 255, 255, 0.06);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  color: white;
}

.stat-label {
  font-size: 0.8rem;
  color: #94a3b8;
}

.stat-value {
  font-size: 1.6rem;
  font-weight: 700;
}

.glass-panel {
  background: rgba(255, 255, 255, 0.06);
  backdrop-filter: blur(12px);
  border-radius: 18px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  color: white;
}

.panel-title {
  font-size: 1rem;
  font-weight: 700;
}

.activity-list {
  font-size: 0.9rem;
  color: #cbd5f5;
  display: grid;
  gap: 8px;
}

.status-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 8px;
  font-size: 0.9rem;
  color: #e2e8f0;
}
</style>
