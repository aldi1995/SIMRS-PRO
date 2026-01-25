<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const hospital = ref({
  name: 'SIMRS PRO Hospital',
  phone: '+62 21 8899 777',
  email: 'admin@simrspro.id',
  address: 'Jakarta, Indonesia'
})
</script>

<template>
<AppLayout>

  <div class="mb-6">
    <h1 class="text-h5 font-weight-bold">Pengaturan Sistem</h1>
    <p class="text-muted">Konfigurasi utama rumah sakit & sistem</p>
  </div>

  <v-row dense>

    <!-- PROFIL RS -->
    <v-col cols="12" md="6">
      <v-card class="glass-card pa-6">

        <strong class="text-h6 mb-4 d-block">
          Profil Rumah Sakit
        </strong>

        <v-text-field label="Nama Rumah Sakit" v-model="hospital.name" />
        <v-text-field label="Telepon" v-model="hospital.phone" />
        <v-text-field label="Email" v-model="hospital.email" />
        <v-textarea label="Alamat" v-model="hospital.address" />

        <v-btn color="primary" class="mt-4">
          Simpan Perubahan
        </v-btn>

      </v-card>
    </v-col>

    <!-- SISTEM -->
    <v-col cols="12" md="6">
      <v-card class="glass-card pa-6">

        <strong class="text-h6 mb-4 d-block">
          Konfigurasi Sistem
        </strong>

        <v-switch label="Aktifkan Audit Log" />
        <v-switch label="Backup Otomatis" />
        <v-switch label="Mode Maintenance" />

        <v-divider class="my-4" />

        <strong class="text-h6 mb-3 d-block">
          Tools Sistem
        </strong>

        <v-btn block variant="outlined" class="mb-2">
          Backup Database Sekarang
        </v-btn>

        <v-btn block variant="outlined" color="warning" class="mb-2">
          Reset Cache Sistem
        </v-btn>

        <v-btn block color="red">
          Reset Sistem
        </v-btn>

      </v-card>
    </v-col>

  </v-row>

</AppLayout>
</template>
