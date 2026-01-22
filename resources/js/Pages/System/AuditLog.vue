<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip } from 'vuetify/components'

const headers = [
  { title: 'Waktu', key: 'time' },
  { title: 'User', key: 'user' },
  { title: 'Aksi', key: 'action' },
  { title: 'IP Address', key: 'ip' },
  { title: 'Status', key: 'status' }
]

const logs = ref([
  { time: '2026-01-22 09:12', user: 'Admin', action: 'Login', ip: '192.168.1.1', status: 'Sukses' },
  { time: '2026-01-22 09:20', user: 'Kasir', action: 'Edit Invoice', ip: '192.168.1.4', status: 'Sukses' },
  { time: '2026-01-22 09:45', user: 'Unknown', action: 'Login Failed', ip: '103.22.9.4', status: 'Gagal' }
])
</script>

<template>
  <Head title="Audit Log" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Audit Log
    </h2>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="logs">

        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Sukses' ? 'green' : 'red'">
            {{ value }}
          </v-chip>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>
