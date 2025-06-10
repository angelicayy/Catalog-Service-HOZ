# 🗂️ Catalog Service API

**Base URL:** `http://localhost:8001`

## Deskripsi Layanan

Catalog Service adalah **etalase digital utama** dari platform **House of Zama**. Layanan ini bertanggung jawab atas:

* Menyediakan daftar seluruh **paket fotografi** yang tersedia.
* Melakukan seluruh operasi **CRUD (Create, Read, Update, Delete)** terhadap data layanan fotografi.
* Menjadi sumber data utama bagi:

  * Klien yang ingin melihat paket yang tersedia.
  * Booking Service yang memerlukan data katalog saat melakukan pemesanan.

---

## 🛠️ Daftar Endpoint

### `POST /api/services`

**Deskripsi:**
🔒 \[Admin] Menambahkan **paket fotografi baru** ke dalam katalog.

**Contoh Request Body:**

```json
{
  "name": "Pre-Wedding Elegant",
  "description": "Paket foto pre-wedding dengan tema elegan",
  "price": 2500000
}
```

---

### `GET /api/services`

**Deskripsi:**
Mengambil daftar **semua paket fotografi** yang tersedia.
📌 Endpoint ini bersifat **publik**.

---

### `GET /api/services/{id}`

**Deskripsi:**
Mengambil **detail spesifik** dari satu paket fotografi berdasarkan ID-nya.

---

### `PUT /api/services/{id}`

**Deskripsi:**
🔒 \[Admin] Memperbarui informasi dari paket fotografi yang sudah ada.
Contoh update meliputi perubahan harga, nama paket, atau deskripsi.

**Contoh Request Body:**

```json
{
  "name": "Pre-Wedding Elegant Deluxe",
  "price": 3000000
}
```

---

### `DELETE /api/services/{id}`

**Deskripsi:**
🔒 \[Admin] Menghapus sebuah paket fotografi dari katalog.

---

## 📝 Catatan Tambahan

* Seluruh data paket akan digunakan lintas layanan, termasuk Booking Service.
* Semua endpoint menggunakan format JSON.
* Endpoint yang bersifat administratif membutuhkan otentikasi dan otorisasi yang sesuai (peran `admin`).

