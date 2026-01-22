<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VTextField, VBtn, VDivider } from 'vuetify/components'

const invoice = ref('INV-001')
const patient = ref('Ahmad Fauzi')
const total = ref(350000)
const paid = ref(0)

const change = () => paid.value - total.value

const formatCurrency = (value) =>
  new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value)
</script>

<template>
  <Head title="Kasir" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Kasir Pembayaran
    </h2>

    <v-card class="glass-panel pa-5">

      <v-text-field label="Nomor Invoice" v-model="invoice" disabled />
      <v-text-field label="Nama Pasien" v-model="patient" disabled />

      <v-divider class="my-3" />

      <div class="d-flex justify-space-between mb-2">
        <span>Total Tagihan</span>
        <strong>{{ formatCurrency(total) }}</strong>
      </div>

      <v-text-field
        label="Jumlah Dibayar"
        type="number"
        v-model="paid"
      />

      <div class="d-flex justify-space-between mt-2">
        <span>Kembalian</span>
        <strong class="text-success">{{ formatCurrency(change()) }}</strong>
      </div>

      <v-btn block color="primary" class="mt-4">
        Proses Pembayaran
      </v-btn>

    </v-card>

  </AppLayout>
</template>
