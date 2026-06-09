<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Dashboard SPK - Jalur Karir PTI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Custom scrollbar untuk dropdown */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(15, 23, 42, 0.6); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #4f46e5; rounded: 3px; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen pb-20 relative overflow-x-hidden">

    <div class="absolute top-[-10%] left-[-20%] w-[600px] h-[600px] bg-indigo-900/20 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute top-[20%] right-[-20%] w-[500px] h-[500px] bg-violet-900/20 rounded-full blur-[120px] pointer-events-none"></div>

    <header class="max-w-5xl mx-auto pt-12 pb-6 px-4 text-center relative z-10">
        <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest backdrop-blur-md mb-4 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
            Decision Support System (DSS)
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-slate-200 to-indigo-200">
            Analytics Career Dashboard
        </h1>
        <p class="text-slate-400 mt-3 max-w-xl mx-auto text-sm md:text-base font-medium">
            Rekomendasi Karir Mahasiswa Pendidikan Teknologi Informasi Menggunakan Algoritma Ilmiah <span class="text-indigo-400">Simple Additive Weighting (SAW)</span>.
        </p>
    </header>

    <main class="max-w-4xl mx-auto px-4 relative z-10">

        <div class="flex justify-center gap-4 mb-6">
            <button id="btnTabCari" onclick="switchTab('cari')" class="px-5 py-2.5 rounded-xl text-sm font-bold border border-indigo-500/30 bg-indigo-600 text-white shadow-lg transition duration-300 cursor-pointer">
                🔍 Cari Data Kuesioner Saya
            </button>
            <button id="btnTabBaru" onclick="switchTab('baru')" class="px-5 py-2.5 rounded-xl text-sm font-bold border border-slate-800 bg-slate-900/60 text-slate-400 hover:text-white transition duration-300 cursor-pointer">
                ✍️ Belum Isi? Isi Kuesioner Disini
            </button>
        </div>

        <section id="panelCari" class="bg-slate-900/60 backdrop-blur-xl border border-slate-800 p-8 rounded-3xl shadow-2xl shadow-indigo-950/20 text-center mb-8 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
            <h2 class="text-2xl font-bold text-white mb-2 tracking-tight">Temukan Rekomendasi Karir Anda</h2>
            <p class="text-xs md:text-sm text-slate-400 mb-6">Ketik nama lengkap Anda untuk mensinkronisasi data kuesioner asli secara instan.</p>
            
            <div class="relative max-w-lg mx-auto">
                <input type="text" id="inputNama" oninput="cariNama()" placeholder="Masukkan nama lengkap Anda..." 
                    class="w-full pl-6 pr-14 py-4 bg-slate-950/80 border border-slate-800 rounded-2xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 font-medium text-white placeholder-slate-500 transition duration-300 shadow-inner">
                <div class="absolute right-4 top-4.5 text-slate-500">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            <div id="saranNama" class="max-w-lg mx-auto bg-slate-900/95 border border-slate-800 rounded-2xl mt-2 hidden text-left max-h-56 overflow-y-auto z-50 shadow-2xl divide-y divide-slate-800/50 backdrop-blur-xl custom-scrollbar"></div>
        </section>

        <section id="panelBaru" class="hidden bg-slate-900/60 backdrop-blur-xl border border-slate-800 p-6 md:p-8 rounded-3xl shadow-2xl mb-8">
            <h2 class="text-2xl font-bold text-white mb-1 tracking-tight text-center">Lembar Kuesioner Mandiri</h2>
            <p class="text-xs md:text-sm text-slate-400 mb-8 text-center">Silakan lengkapi biodata dan pilih respon skala (1 - 5) sesuai kondisi riil minat kesukaan Anda.</p>
            
            <div class="space-y-6 max-w-2xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-indigo-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <input type="text" id="formNamaBaru" placeholder="Contoh: ADINDA NAZWA" class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 text-white font-medium text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-indigo-400 uppercase tracking-wider mb-2">Minat Konsentrasi / Jalur Karir Saat Ini</label>
                        <select id="formMinatBaru" class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 text-slate-300 font-medium text-sm">
                            <option value="Belum Menentukan">Belum Menentukan</option>
                            <option value="Software Developer">Software Developer</option>
                            <option value="Data Analyst">Data Analyst</option>
                            <option value="Network Engineer">Network Engineer</option>
                            <option value="UI/UX Designer">UI/UX Designer</option>
                            <option value="Cyber Security">Cyber Security</option>
                        </select>
                    </div>
                </div>

                <div class="border-t border-slate-800/80 pt-6 space-y-8">
                    <div>
                        <h3 class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-3 bg-blue-500/5 px-3 py-1.5 rounded-lg border border-blue-500/20 inline-block">Kluster A: Pemrograman (C1)</h3>
                        <div class="space-y-3 mt-2" id="group-c1"></div>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-3 bg-emerald-500/5 px-3 py-1.5 rounded-lg border border-emerald-500/20 inline-block">Kluster B: Sains Data (C2)</h3>
                        <div class="space-y-3 mt-2" id="group-c2"></div>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-amber-400 uppercase tracking-widest mb-3 bg-amber-500/5 px-3 py-1.5 rounded-lg border border-amber-500/20 inline-block">Kluster C: Jaringan Komputer (C3)</h3>
                        <div class="space-y-3 mt-2" id="group-c3"></div>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-purple-400 uppercase tracking-widest mb-3 bg-purple-500/5 px-3 py-1.5 rounded-lg border border-purple-500/20 inline-block">Kluster D: Antarmuka / UI/UX (C4)</h3>
                        <div class="space-y-3 mt-2" id="group-c4"></div>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-rose-400 uppercase tracking-widest mb-3 bg-rose-500/5 px-3 py-1.5 rounded-lg border border-rose-500/20 inline-block">Kluster E: Keamanan Siber (C5)</h3>
                        <div class="space-y-3 mt-2" id="group-c5"></div>
                    </div>
                </div>

                <button id="btnSubmitMandiri" onclick="prosesFormMandiri()" class="w-full mt-4 bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-600 hover:to-violet-700 text-white font-bold py-4 px-6 rounded-xl shadow-xl transition duration-300 transform active:scale-98 cursor-pointer text-sm tracking-wider uppercase">
                    PROSES JALUR KARIR SAYA DENGAN SAW &raquo;
                </button>
            </div>
        </section>

        <div id="area-hasil" class="hidden space-y-6">
            <div class="bg-gradient-to-r from-slate-900/90 to-indigo-950/40 backdrop-blur-xl border border-slate-800/80 p-6 rounded-2xl shadow-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <span class="text-[10px] font-bold uppercase text-indigo-400 tracking-widest block mb-0.5">Subjek Analisis</span>
                    <h3 id="mhs-nama-display" class="text-2xl font-extrabold text-white tracking-tight">-</h3>
                </div>
                <div class="bg-slate-950/80 border border-slate-800 px-4 py-2 rounded-xl text-right">
                    <span class="text-[9px] uppercase font-bold text-slate-500 block tracking-wider">Pilihan/Minat Dominan</span>
                    <span id="pilihan-awal" class="text-xs font-bold text-indigo-300">-</span>
                </div>
            </div>

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-6 rounded-2xl shadow-lg">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">📈 Parameter Nilai Input Rata-Rata (Kriteria C1 - C5)</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">
                    <div class="bg-slate-950/60 p-4 rounded-xl border border-slate-800/80">
                        <div class="text-[9px] text-blue-400 font-bold uppercase tracking-wider mb-2">C1 (Programming)</div>
                        <div id="score-c1" class="text-3xl font-black text-white">-</div>
                    </div>
                    <div class="bg-slate-950/60 p-4 rounded-xl border border-slate-800/80">
                        <div class="text-[9px] text-emerald-400 font-bold uppercase tracking-wider mb-2">C2 (Data Science)</div>
                        <div id="score-c2" class="text-3xl font-black text-white">-</div>
                    </div>
                    <div class="bg-slate-950/60 p-4 rounded-xl border border-slate-800/80">
                        <div class="text-[9px] text-amber-400 font-bold uppercase tracking-wider mb-2">C3 (Networking)</div>
                        <div id="score-c3" class="text-3xl font-black text-white">-</div>
                    </div>
                    <div class="bg-slate-950/60 p-4 rounded-xl border border-slate-800/80">
                        <div class="text-[9px] text-purple-400 font-bold uppercase tracking-wider mb-2">C4 (UI/UX Design)</div>
                        <div id="score-c4" class="text-3xl font-black text-white">-</div>
                    </div>
                    <div class="bg-slate-950/60 p-4 rounded-xl border border-slate-800/80">
                        <div class="text-[9px] text-rose-400 font-bold uppercase tracking-wider mb-2">C5 (Cyber Security)</div>
                        <div id="score-c5" class="text-3xl font-black text-white">-</div>
                    </div>
                </div>
            </section>

            <section class="bg-slate-900/60 backdrop-blur-xl border border-slate-800 p-6 md:p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-48 h-48 bg-indigo-500/5 rounded-full blur-3xl"></div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-5">🎯 Hasil Analisis & Pemeringkatan Akhir (V)</h3>
                <div class="flex flex-col md:flex-row items-center justify-between p-6 bg-gradient-to-r from-indigo-950/80 to-slate-950/50 border border-indigo-500/20 rounded-2xl mb-8">
                    <div class="mb-4 md:mb-0 text-center md:text-left">
                        <span class="text-[9px] bg-gradient-to-r from-indigo-500 to-violet-600 text-white px-3 py-1 rounded-full font-bold uppercase tracking-wider">Rekomendasi Utama</span>
                        <div id="rekomendasi-karir" class="text-2xl md:text-3xl font-black text-white mt-2.5 tracking-tight">Calculating...</div>
                    </div>
                    <div class="text-center bg-slate-950/80 px-6 py-3 rounded-xl border border-indigo-500/20 shadow-xl">
                        <div class="text-[9px] font-bold text-slate-500 uppercase tracking-wider mb-1">Skor Akhir SAW (V)</div>
                        <div id="skor-akhir" class="text-3xl font-black text-indigo-400">-</div>
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Komparasi Peringkat Kecocokan Karir:</h4>
                    <div id="list-ranking" class="space-y-3.5"></div>
                </div>
            </section>
        </div>

        <div id="not-found" class="hidden text-center p-6 bg-rose-950/30 text-rose-400 rounded-2xl border border-rose-900/50 max-w-md mx-auto backdrop-blur-md">
            <span class="font-bold text-sm">Nama tidak ditemukan!</span><br>
            <span class="text-xs text-slate-400">Silakan klik tombol "Belum Isi? Isi Kuesioner Disini" di atas.</span>
        </div>
    </main>

    <script>
        // DATA TEKS PERTANYAAN RESMI
        const pertanyaanKuesioner = {
            c1: ["Saya memahami dasar-dasar pemrograman dengan baik.", "Saya mampu membuat program sederhana menggunakan bahasa pemrograman.", "Saya tertarik mempelajari pengembangan aplikasi/software.", "Saya mampu menyelesaikan tugas coding secara mandiri.", "Saya memahami logika dan algoritma pemrograman."],
            c2: ["Saya mampu membaca dan memahami data.", "Saya tertarik pada pengolahan dan analisis data.", "Saya mampu menggunakan tools pengolahan data.", "Saya memahami dasar statistik sederhana \",\"5. Saya tertarik pada bidang Data Analyst atau Data Science."],
            c3: ["Saya memahami dasar jaringan komputer.", "Saya mampu melakukan konfigurasi jaringan sederhana.", "Saya tertarik pada administrasi jaringan.", "Saya memahami perangkat jaringan komputer.", "Saya tertarik bekerja di bidang Network Engineer."],
            c4: ["Saya memahami dasar desain antarmuka.", "Saya mampu menggunakan tools desain seperti Figma.", "Saya tertarik membuat tampilan aplikasi yang menarik.", "Saya memahami pengalaman pengguna (User Experience).", "Saya tertarik pada bidang UI/UX Designer."],
            c5: ["Saya memahami dasar keamanan sistem informasi.", "Saya tertarik pada bidang keamanan siber.", "Saya memahami ancaman keamanan pada sistem komputer.", "Saya tertarik mempelajari ethical hacking.", "Saya memahami pentingnya keamanan data."]
        };

        // DATABASE INTERNAL 30 MAHASISWA ASLI
        const databaseMahasiswa = [
            { nama: "M. RAYNALDO FITRA PRATAMA", c1: (4+5+4+5+4)/5, c2: (4+5+4+4+5)/5, c3: (5+4+4+2+3)/5, c4: (4+5+4+5+4)/5, c5: (4+3+4+4+3)/5, pilihan: "Data Analyst" },
            { nama: "MUHAMMAD HAMIM JAZULI", c1: (2+4+3+4+4)/5, c2: (5+4+3+3+4)/5, c3: (5+4+3+5+3)/5, c4: (4+5+3+4+3)/5, c5: (3+4+3+4+4)/5, pilihan: "UI/UX Designer" },
            { nama: "YULIA RIESTA FARADILA", c1: (3+5+3+4+3)/5, c2: (3+4+4+3+2)/5, c3: (4+2+3+4+4)/5, c4: (4+4+3+4+3)/5, c5: (4+3+5+3+2)/5, pilihan: "Cyber Security" },
            { nama: "PUTRI NOV SYAWULANDARI", c1: (5+3+2+4+4)/5, c2: (3+3+3+2+3)/5, c3: (4+3+4+5+3)/5, c4: (3+4+3+5+4)/5, c5: (3+3+4+2+3)/5, pilihan: "Software Developer" },
            { nama: "ACHMAD RAFLI DELLY WAHYUDI", c1: (4+3+4+5+3)/5, c2: (4+2+4+3+4)/5, c3: (3+4+3+3+4)/5, c4: (3+2+3+3+4)/5, c5: (4+3+5+3+5)/5, pilihan: "UI/UX Designer" },
            { nama: "ADINDA NAZWA DYAN MEILANI", c1: (4+5+3+4+3)/5, c2: (4+3+5+3+4)/5, c3: (3+4+5+4+3)/5, c4: (5+3+4+3+4)/5, c5: (4+5+3+5+4)/5, pilihan: "Cyber Security" },
            { nama: "MUHAMAD GHOZI FAWWAZ T", c1: (3+4+5+5+4)/5, c2: (4+5+3+4+5)/5, c3: (4+5+4+5+4)/5, c4: (5+4+5+3+5)/5, c5: (4+3+5+4+5)/5, pilihan: "Software Developer" },
            { nama: "ANISAH KHANSA ZHAFIRAH", c1: (5+3+4+5+5)/5, c2: (4+5+3+5+3)/5, c3: (5+3+4+5+3)/5, c4: (5+3+5+3+4)/5, c5: (5+3+5+3+4)/5, pilihan: "Network Engineer" },
            { nama: "EVIDA NUR CHURIN'IN", c1: (5+3+4+5+3)/5, c2: (5+3+4+3+3)/5, c3: (5+4+5+4+5)/5, c4: (4+5+3+5+3)/5, c5: (5+3+4+5+3)/5, pilihan: "Network Engineer" },
            { nama: "HILWA MUHTAR", c1: (4+3+5+3+5)/5, c2: (5+3+5+3+4)/5, c3: (5+3+4+3+4)/5, c4: (5+3+4+3+3)/5, c5: (4+3+5+3+4)/5, pilihan: "Network Engineer" },
            { nama: "RACHEL ANGELINE WAHYU NINGSIH", c1: (5+3+4+4+5)/5, c2: (5+3+5+3+4)/5, c3: (4+5+3+5+3)/5, c4: (4+5+3+5+3)/5, c5: (4+5+3+4+5)/5, pilihan: "Cyber Security" },
            { nama: "SALIZA ALEEYA", c1: (5+3+3+5+3)/5, c2: (5+3+5+3+4)/5, c3: (5+4+3+5+3)/5, c4: (5+3+4+5+4)/5, c5: (5+3+4+5+5)/5, pilihan: "Network Engineer" },
            { nama: "AULIYAA ZULFA", c1: (5+3+4+5+3)/5, c2: (5+3+4+5+4)/5, c3: (5+3+4+5+3)/5, c4: (3+4+3+5+5)/5, c5: (3+4+5+5+4)/5, pilihan: "UI/UX Designer" },
            { nama: "NAJWA AFIFAH", c1: (5+3+4+5+4)/5, c2: (5+4+5+4+5)/5, c3: (4+5+3+5+3)/5, c4: (5+4+3+4+3)/5, c5: (4+5+4+5+4)/5, pilihan: "Network Engineer" },
            { nama: "RISTA PUTRI NABILLA", c1: (5+3+4+5+3)/5, c2: (4+3+4+5+5)/5, c3: (3+4+5+3+4)/5, c4: (5+3+4+5+3)/5, c5: (5+3+4+5+4)/5, pilihan: "Cyber Security" },
            { nama: "ZAYYANA TSABITA AZZAHRA", c1: (5+4+5+3+4)/5, c2: (5+3+4+5+3)/5, c3: (5+3+4+5+4)/5, c4: (4+5+3+4+3)/5, c5: (4+5+3+5+4)/5, pilihan: "Cyber Security" },
            { nama: "KHALIMATUS SA'DIYAH", c1: (5+4+5+3+4)/5, c2: (5+3+4+3+5)/5, c3: (4+3+5+4+5)/5, c4: (4+5+3+4+3)/5, c5: (4+5+3+5+3)/5, pilihan: "Cyber Security" },
            { nama: "VANESSA DEWI AGUSTINA", c1: (5+3+5+3+5)/5, c2: (4+3+5+3+4)/5, c3: (5+3+4+5+3)/5, c4: (4+3+5+4+3)/5, c5: (4+5+3+4+5)/5, pilihan: "UI/UX Designer" },
            { nama: "NURFIKA ALFIANINGRUM", c1: (5+4+5+4+5)/5, c2: (5+4+4+5+4)/5, c3: (4+4+3+4+5)/5, c4: (5+4+5+3+5)/5, c5: (4+5+3+4+5)/5, pilihan: "Cyber Security" },
            { nama: "CINDI JINGGA FEBRIANTI", c1: (5+4+5+3+5)/5, c2: (3+5+4+4+4)/5, c3: (4+5+4+3+5)/5, c4: (4+5+3+4+5)/5, c5: (4+5+3+4+5)/5, pilihan: "UI/UX Designer" },
            { nama: "JIHAN NURLITHA SARI", c1: (4+5+3+5+4)/5, c2: (4+5+3+5+4)/5, c3: (4+5+4+5+4)/5, c4: (5+4+5+3+4)/5, c5: (5+3+5+4+5)/5, pilihan: "Cyber Security" },
            { nama: "ANGGY SASMITA NINGRUM", c1: (5+3+4+5+4)/5, c2: (4+5+4+5+4)/5, c3: (5+4+5+3+4)/5, c4: (5+3+4+5+5)/5, c5: (5+4+5+4+5)/5, pilihan: "Cyber Security" },
            { nama: "NALA ADANI PUTRI", c1: (3+2+3+2+3)/5, c2: (3+3+2+3+4)/5, c3: (3+4+3+4+3)/5, c4: (3+4+3+4+3)/5, c5: (4+3+4+3+5)/5, pilihan: "Network Engineer" },
            { nama: "RENGGANIS AYU NURLAILA", c1: (3+5+4+3+5)/5, c2: (5+3+4+5+3)/5, c3: (4+5+3+5+4)/5, c4: (5+3+5+3+5)/5, c5: (4+5+3+4+5)/5, pilihan: "Cyber Security" },
            { nama: "ZAIN AHMAD MUZAKKI", c1: (4+5+4+5+4)/5, c2: (5+4+5+4+5)/5, c3: (4+5+4+5+4)/5, c4: (4+5+3+5+4)/5, c5: (5+3+4+5+4)/5, pilihan: "UI/UX Designer" },
            { nama: "CARRISA ALEYDA MAULANA", c1: (2+3+4+3+4)/5, c2: (3+4+3+4+3)/5, c3: (3+4+3+4+3)/5, c4: (3+4+3+5+2)/5, c5: (4+3+3+2+3)/5, pilihan: "Belum Menentukan" },
            { nama: "RENDY ARDIYANTO", c1: (3+4+5+3+4)/5, c2: (5+4+5+3+5)/5, c3: (3+5+4+3+4)/5, c4: (3+4+5+3+4)/5, c5: (5+3+4+5+3)/5, pilihan: "Network Engineer" },
            { nama: "HAMIDA MAULIDA", c1: (5+3+4+5+5)/5, c2: (4+5+5+4+5)/5, c3: (5+4+5+4+5)/5, c4: (4+5+4+5+4)/5, c5: (5+4+4+5+4)/5, pilihan: "Network Engineer" },
            { nama: "RISMA AULLIA ZAIRULL IKHROM", c1: (5+3+4+5+3)/5, c2: (5+3+4+5+3)/5, c3: (5+4+5+4+5)/5, c4: (4+5+3+4+5)/5, c5: (4+5+4+5+4)/5, pilihan: "Cyber Security" },
            { nama: "MARIMBI AULIA PUTRI", c1: (5+5+3+4+5)/5, c2: (4+5+3+5+3)/5, c3: (5+3+4+5+4)/5, c4: (4+3+5+3+5)/5, c5: (3+5+4+5+4)/5, pilihan: "Cyber Security" }
        ];

        const maxC = [5.0, 5.0, 5.0, 5.0, 5.0];
        const bobot = [0.2, 0.2, 0.2, 0.2, 0.2];
        const alternatifNama = ["Software Engineer / Programmer", "Data Analyst / Data Scientist", "Network Engineer", "UI/UX Designer", "Cyber Security Analyst"];

        window.onload = function() {
            renderQuestions('c1', 'group-c1');
            renderQuestions('c2', 'group-c2');
            renderQuestions('c3', 'group-c3');
            renderQuestions('c4', 'group-c4');
            renderQuestions('c5', 'group-c5');
        };

        function renderQuestions(key, elementId) {
            const container = document.getElementById(elementId);
            pertanyaanKuesioner[key].forEach((text, index) => {
                container.innerHTML += `
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 bg-slate-950/40 rounded-xl border border-slate-800/60">
                        <span class="text-xs font-medium text-slate-300"><span class="text-slate-500 font-bold mr-1">${index+1}.</span> ${text}</span>
                        <div class="flex items-center gap-1.5 self-end sm:self-center">
                            <select id="input-${key}-${index}" class="bg-slate-900 border border-slate-700 rounded-lg text-xs font-bold text-white py-1 px-2.5">
                                <option value="1">1 (Sangat Tidak Setuju)</option>
                                <option value="2">2 (Tidak Setuju)</option>
                                <option value="3" selected>3 (Ragu-Ragu)</option>
                                <option value="4">4 (Setuju)</option>
                                <option value="5">5 (Sangat Setuju)</option>
                            </select>
                        </div>
                    </div>
                `;
            });
        }

        function switchTab(type) {
            const tabCari = document.getElementById('panelCari');
            const tabBaru = document.getElementById('panelBaru');
            const btnCari = document.getElementById('btnTabCari');
            const btnBaru = document.getElementById('btnTabBaru');
            document.getElementById('area-hasil').classList.add('hidden');
            document.getElementById('not-found').classList.add('hidden');

            if(type === 'cari') {
                tabCari.classList.remove('hidden'); tabBaru.classList.add('hidden');
                btnCari.className = "px-5 py-2.5 rounded-xl text-sm font-bold border border-indigo-500/30 bg-indigo-600 text-white shadow-lg cursor-pointer";
                btnBaru.className = "px-5 py-2.5 rounded-xl text-sm font-bold border border-slate-800 bg-slate-900/60 text-slate-400 hover:text-white cursor-pointer";
            } else {
                tabCari.classList.add('hidden'); tabBaru.classList.remove('hidden');
                btnCari.className = "px-5 py-2.5 rounded-xl text-sm font-bold border border-slate-800 bg-slate-900/60 text-slate-400 hover:text-white cursor-pointer";
                btnBaru.className = "px-5 py-2.5 rounded-xl text-sm font-bold border border-indigo-500/30 bg-indigo-600 text-white shadow-lg cursor-pointer";
            }
        }

        function cariNama() {
            const input = document.getElementById('inputNama').value.toUpperCase().trim();
            const saranDiv = document.getElementById('saranNama');
            if (input.length < 2) { saranDiv.classList.add('hidden'); return; }
            const hasilFilter = databaseMahasiswa.filter(m => m.nama.includes(input));
            if (hasilFilter.length > 0) {
                saranDiv.innerHTML = ''; saranDiv.classList.remove('hidden');
                document.getElementById('not-found').classList.add('hidden');
                hasilFilter.forEach(mhs => {
                    const item = document.createElement('div');
                    item.className = "p-4 hover:bg-indigo-500/10 cursor-pointer text-sm font-semibold text-slate-300";
                    item.innerText = mhs.nama;
                    item.onclick = function() {
                        document.getElementById('inputNama').value = mhs.nama;
                        saranDiv.classList.add('hidden'); prosesSAW(mhs);
                    };
                    saranDiv.appendChild(item);
                });
            } else {
                saranDiv.classList.add('hidden'); document.getElementById('area-hasil').classList.add('hidden');
                document.getElementById('not-found').classList.remove('hidden');
            }
        }

        function prosesFormMandiri() {
            const namaInput = document.getElementById('formNamaBaru').value.trim();
            const minatInput = document.getElementById('formMinatBaru').value;
            const btnSubmit = document.getElementById('btnSubmitMandiri');
            
            if(!namaInput) { alert("Harap isi Nama Lengkap Anda terlebih dahulu!"); return; }

            btnSubmit.innerText = "⏳ MENYIMPAN DATA KE ...";
            btnSubmit.disabled = true;

            const hitungRerata = (key) => {
                let total = 0;
                for(let i=0; i<5; i++) { total += parseInt(document.getElementById(`input-${key}-${i}`).value) || 3; }
                return total / 5;
            };

            const customMhs = {
                nama: namaInput.toUpperCase(), pilihan: minatInput,
                c1: hitungRerata('c1'), c2: hitungRerata('c2'), c3: hitungRerata('c3'), c4: hitungRerata('c4'), c5: hitungRerata('c5')
            };

            // =========================================================================
            // TEMPEL URL WEB APP (MAKRO/EXEC) DARI GOOGLE APPS SCRIPT ANDA DI BAWAH INI:
            // =========================================================================
            const urlDatabase = "PASTE_URL_WEB_APP_APPS_SCRIPT_ANDA_DI_SINI"; 
            
            fetch(urlDatabase, {
                method: "POST",
                mode: "no-cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(customMhs)
            })
            .then(() => {
                console.log("Data sukses terkirim ke Google Sheets.");
                btnSubmit.innerText = "PROSES JALUR KARIR SAYA DENGAN SAW »";
                btnSubmit.disabled = false;
            })
            .catch(err => {
                console.error("Gagal mengirim data:", err);
                btnSubmit.innerText = "PROSES JALUR KARIR SAYA DENGAN SAW »";
                btnSubmit.disabled = false;
            });

            prosesSAW(customMhs);
        }

        function prosesSAW(mhs) {
            document.getElementById('mhs-nama-display').innerText = mhs.nama;
            document.getElementById('score-c1').innerText = mhs.c1.toFixed(1);
            document.getElementById('score-c2').innerText = mhs.c2.toFixed(1);
            document.getElementById('score-c3').innerText = mhs.c3.toFixed(1);
            document.getElementById('score-c4').innerText = mhs.c4.toFixed(1);
            document.getElementById('score-c5').innerText = mhs.c5.toFixed(1);
            document.getElementById('pilihan-awal').innerText = mhs.pilihan;

            const r1 = mhs.c1 / maxC[0], r2 = mhs.c2 / maxC[1], r3 = mhs.c3 / maxC[2], r4 = mhs.c4 / maxC[3], r5 = mhs.c5 / maxC[4];
            const v1 = r1 * bobot[0], v2 = r2 * bobot[1], v3 = r3 * bobot[2], v4 = r4 * bobot[3], v5 = r5 * bobot[4];

            const daftarSkor = [
                { nama: alternatifNama[0], skor: v1 }, { nama: alternatifNama[1], skor: v2 },
                { nama: alternatifNama[2], skor: v3 }, { nama: alternatifNama[3], skor: v4 }, { nama: alternatifNama[4], skor: v5 }
            ];

            daftarSkor.sort((a, b) => b.skor - a.skor);
            document.getElementById('rekomendasi-karir').innerText = daftarSkor[0].nama;
            document.getElementById('skor-akhir').innerText = daftarSkor[0].skor.toFixed(3);

            const listRankingDiv = document.getElementById('list-ranking');
            listRankingDiv.innerHTML = '';
            
            daftarSkor.forEach((item, index) => {
                const lebarPersen = (item.skor / 0.2) * 100; 
                const warnaBar = index === 0 ? 'bg-gradient-to-r from-indigo-500 to-violet-500 shadow-[0_0_12px_rgba(99,102,241,0.5)]' : 'bg-slate-700';
                const latarItem = index === 0 ? 'bg-indigo-950/40 border-indigo-500/30' : 'bg-slate-950/40 border-slate-800/80';
                listRankingDiv.innerHTML += `
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 border rounded-2xl gap-2 ${latarItem}">
                        <div class="sm:w-1/2 font-bold ${index === 0 ? 'text-indigo-300' : 'text-slate-300'}">${index + 1}. ${item.nama}</div>
                        <div class="sm:w-1/3 bg-slate-900 rounded-full h-2 overflow-hidden border border-slate-800/40">
                            <div class="${warnaBar} h-full rounded-full transition-all duration-1000 ease-out" style="width: ${lebarPersen}%"></div>
                        </div>
                        <div class="font-mono font-bold text-slate-400 text-right text-sm">${item.skor.toFixed(3)}</div>
                    </div>
                `;
            });

            const areaHasilDiv = document.getElementById('area-hasil');
            areaHasilDiv.classList.remove('hidden'); areaHasilDiv.classList.add('fade-in-up');
            areaHasilDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>
</body>
</html>




