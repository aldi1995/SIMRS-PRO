<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VBtn, VList, VListItem, VIcon } from 'vuetify/components'

const masterData = ref([
  { name: 'Poli / Klinik', icon: 'mdi-hospital-building' },
  { name: 'Dokter', icon: 'mdi-account-heart' },
  { name: 'Tindakan Medis', icon: 'mdi-medical-bag' },
  { name: 'Diagnosa (ICD-10)', icon: 'mdi-format-list-text' },
  { name: 'Obat & Farmasi', icon: 'mdi-pill' },
  { name: 'Tarif & Billing', icon: 'mdi-currency-usd' }
])
</script>

<template>
  <Head title="Master Data" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Master Data Sistem
    </h2>

    <v-card class="glass-panel pa-3">

      <v-list>
        <v-list-item
          v-for="item in masterData"
          :key="item.name"
          class="mb-2"
        >
          <template #prepend>
            <v-icon :icon="item.icon" class="me-3" />
          </template>

          <v-list-item-title>{{ item.name }}</v-list-item-title>

          <template #append>
            <v-btn size="small" variant="text" color="primary">
              Kelola
            </v-btn>
          </template>

        </v-list-item>
      </v-list>

    </v-card>

  </AppLayout>
</template>
