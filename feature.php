<?php
// features.php - ADVANCED GIT INTERACTIVE LAB & UTILITIES
$aliases = [
    ["alias" => "co", "cmd" => "checkout", "desc" => "Chuyển nhánh nhanh"],
    ["alias" => "br", "cmd" => "branch", "desc" => "Quản lý nhánh"],
    ["alias" => "ci", "cmd" => "commit", "desc" => "Tạo commit"],
    ["alias" => "st", "cmd" => "status -s", "desc" => "Xem trạng thái ngắn gọn"],
    ["alias" => "lg", "cmd" => "log --oneline --graph --decorate --all", "desc" => "Xem cây log đồ họa super cool"],
    ["alias" => "unstage", "cmd" => "reset HEAD --", "desc" => "Bỏ stage file"],
    ["alias" => "last", "cmd" => "log -1 HEAD", "desc" => "Xem commit cuối cùng"],
];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT TERMINAL // ADVANCED FEATURES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: #0d1117;
            color: #c9d1d9;
        }

        .cyber-border {
            border: 1px solid #30363d;
            position: relative;
        }

        .cyber-border::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            width: 8px;
            height: 8px;
            border-top: 2px solid #38bdf8;
            border-left: 2px solid #38bdf8;
        }

        .cyber-border::after {
            content: '';
            position: absolute;
            bottom: -1px;
            right: -1px;
            width: 8px;
            height: 8px;
            border-bottom: 2px solid #38bdf8;
            border-right: 2px solid #38bdf8;
        }

        .scanline {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.3));
            background-size: 100% 4px;
        }

        .glow-cyan {
            text-shadow: 0 0 8px rgba(56, 189, 248, 0.6);
        }
    </style>
</head>

<body class="min-h-screen pb-12 scanline">

    <!-- HEADER -->
    <header class="border-b border-gray-800 bg-gray-900/80 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-gray-400 hover:text-cyan-400 transition mr-2" title="Quay lại Dashboard">
                    <i class="fa-solid fa-arrow-left text-xl"></i>
                </a>
                <i class="fa-solid fa-microchip text-3xl text-cyan-400 animate-pulse"></i>
                <div>
                    <h1 class="text-xl font-bold text-white tracking-widest glow-cyan">GIT_LAB // ADVANCED_TOOLS</h1>
                    <p class="text-xs text-gray-400">Công cụ tương tác & Trình tạo lệnh Git nâng cao</p>
                </div>
            </div>
            <div class="hidden md:flex gap-4 text-xs font-semibold">
                <a href="#builder" class="text-cyan-400 hover:underline"><i class="fa-solid fa-wrench mr-1"></i>Command Builder</a>
                <a href="#conflict" class="text-yellow-400 hover:underline"><i class="fa-solid fa-code-compare mr-1"></i>Conflict Simulator</a>
                <a href="#alias" class="text-emerald-400 hover:underline"><i class="fa-solid fa-bolt mr-1"></i>Alias Generator</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 mt-8 space-y-12">

        <!-- SECTION 1: DYNAMIC COMMAND BUILDER -->
        <section id="builder" class="cyber-border bg-gray-900/90 p-6 rounded-lg">
            <div class="flex items-center gap-2 mb-4">
                <i class="fa-solid fa-terminal text-cyan-400 text-lg"></i>
                <h2 class="text-lg font-bold text-white uppercase tracking-wider">1. Git Interactive Command Builder</h2>
            </div>
            <p class="text-xs text-gray-400 mb-6">Chọn hành động và các tham số tùy chọn để tự tạo câu lệnh Git chuẩn xác theo từng trường hợp cụ thể.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Step 1: Action -->
                <div>
                    <label class="text-xs text-cyan-400 font-bold block mb-2">// BƯỚC 1: CHỌN THAO TÁC</label>
                    <select id="actionSelect" onchange="updateBuilder()" class="w-full bg-black border border-gray-700 rounded p-3 text-sm text-gray-200 focus:border-cyan-500 outline-none">
                        <option value="commit">Git Commit (Lưu thay đổi)</option>
                        <option value="log">Git Log (Xem lịch sử)</option>
                        <option value="reset">Git Reset (Quay lại phiên bản)</option>
                        <option value="push">Git Push (Đẩy code)</option>
                    </select>
                </div>

                <!-- Step 2: Options -->
                <div>
                    <label class="text-xs text-cyan-400 font-bold block mb-2">// BƯỚC 2: CẤU HÌNH TÙY CHỌN</label>
                    <div id="optionsContainer" class="space-y-2 bg-black/40 p-3 rounded border border-gray-800 text-xs">
                        <!-- Options injected by JS -->
                    </div>
                </div>

                <!-- Step 3: Input & Output -->
                <div class="flex flex-col justify-between">
                    <div>
                        <label class="text-xs text-cyan-400 font-bold block mb-2">// BƯỚC 3: NHẬP GIÁ TRỊ (NẾU CÓ)</label>
                        <input type="text" id="customInput" oninput="updateBuilder()" placeholder="Mô tả / Tên branch / Commit Hash..." class="w-full bg-black border border-gray-700 rounded p-3 text-sm text-cyan-300 outline-none focus:border-cyan-500 mb-4">
                    </div>

                    <!-- Result Box -->
                    <div class="bg-black p-4 rounded border border-cyan-500/50 relative">
                        <span class="text-[10px] text-gray-500 block mb-1">CÂU LỆNH ĐƯỢC TẠO:</span>
                        <code id="generatedCmd" class="text-sm font-bold text-cyan-400 break-all block">git commit -m "update"</code>
                        <button onclick="copyGenerated()" class="absolute top-3 right-3 text-xs bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/40 px-2 py-1 rounded">
                            <i class="fa-regular fa-copy mr-1"></i>Copy
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: MERGE CONFLICT SIMULATOR -->
        <section id="conflict" class="cyber-border bg-gray-900/90 p-6 rounded-lg">
            <div class="flex items-center gap-2 mb-4">
                <i class="fa-solid fa-triangle-exclamation text-yellow-400 text-lg"></i>
                <h2 class="text-lg font-bold text-white uppercase tracking-wider">2. Merge Conflict Resolver Playground</h2>
            </div>
            <p class="text-xs text-gray-400 mb-6">Thử nghiệm đọc đoạn mã bị Xung đột (Conflict) và nhấn chọn phiên bản code bạn muốn giữ lại.</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Conflict View Code -->
                <div class="bg-black p-4 rounded border border-gray-800 font-mono text-xs leading-relaxed">
                    <span class="text-gray-500">// File: index.php</span><br>
                    <span class="text-gray-400">function calculateTotal($price) {</span><br>
                    <span class="text-rose-400 font-bold">&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD (Nhánh hiện tại của bạn)</span><br>
                    <span class="text-rose-300 bg-rose-950/50 block pl-2" id="codeCurrent"> return $price * 1.1; // Tính VAT 10%</span>
                    <span class="text-yellow-400 font-bold">=======</span><br>
                    <span class="text-emerald-300 bg-emerald-950/50 block pl-2" id="codeIncoming"> return $price * 1.08; // Tính VAT 8% theo luật mới</span>
                    <span class="text-emerald-400 font-bold">&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature/vat-update (Nhánh được gộp vào)</span><br>
                    <span class="text-gray-400">}</span>
                </div>

                <!-- Action Controls -->
                <div class="flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <label class="text-xs text-yellow-400 font-bold block">// CHỌN CÁCH XỬ LÝ CONFLICT:</label>
                        <button onclick="resolveConflict('current')" class="w-full text-left p-3 rounded border border-rose-500/30 bg-rose-500/10 hover:bg-rose-500/20 text-xs text-rose-300 transition">
                            <i class="fa-solid fa-check mr-2"></i> Giữ thay đổi của bạn (Current Change - HEAD)
                        </button>
                        <button onclick="resolveConflict('incoming')" class="w-full text-left p-3 rounded border border-emerald-500/30 bg-emerald-500/10 hover:bg-emerald-500/20 text-xs text-emerald-300 transition">
                            <i class="fa-solid fa-check mr-2"></i> Chấp nhận thay đổi mới đến (Incoming Change)
                        </button>
                        <button onclick="resolveConflict('both')" class="w-full text-left p-3 rounded border border-cyan-500/30 bg-cyan-500/10 hover:bg-cyan-500/20 text-xs text-cyan-300 transition">
                            <i class="fa-solid fa-layer-group mr-2"></i> Giữ cả hai thay đổi (Combine Both)
                        </button>
                    </div>

                    <!-- Output Resolved Code -->
                    <div class="bg-black/80 p-3 rounded border border-gray-800">
                        <span class="text-[10px] text-gray-500 block mb-1">KẾT QUẢ SAU KHI SỬA:</span>
                        <pre id="resolvedOutput" class="text-xs text-emerald-400 font-mono">// Chọn một tùy chọn phía trên để thấy kết quả...</pre>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: GIT ALIAS CONFIG GENERATOR -->
        <section id="alias" class="cyber-border bg-gray-900/90 p-6 rounded-lg">
            <div class="flex items-center gap-2 mb-4">
                <i class="fa-solid fa-bolt text-emerald-400 text-lg"></i>
                <h2 class="text-lg font-bold text-white uppercase tracking-wider">3. Git Supercharge Config Generator</h2>
            </div>
            <p class="text-xs text-gray-400 mb-6">Thêm các lối tắt (Alias) này vào file `.gitconfig` để gõ lệnh nhanh gấp 3 lần.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Alias Table -->
                <div class="space-y-2">
                    <?php foreach ($aliases as $item): ?>
                        <div class="flex items-center justify-between p-2.5 bg-black/50 border border-gray-800 rounded text-xs">
                            <div>
                                <span class="text-emerald-400 font-bold font-mono">git <?php echo $item['alias']; ?></span>
                                <span class="text-gray-500 mx-2">➔</span>
                                <span class="text-gray-300 font-mono">git <?php echo $item['cmd']; ?></span>
                            </div>
                            <span class="text-[10px] text-gray-500"><?php echo $item['desc']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Config Export Box -->
                <div class="bg-black p-4 rounded border border-gray-800 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-gray-500 block mb-2">// DÁN ĐOẠN NÀY VÀO FILE ~/.gitconfig HOẶC CHẠY BẰNG TERMINAL:</span>
                        <pre id="aliasConfigText" class="text-xs text-emerald-300 font-mono leading-relaxed bg-gray-950 p-3 rounded border border-gray-900 overflow-x-auto">[alias]
<?php foreach ($aliases as $item): ?>
    <?php echo str_pad($item['alias'], 8); ?> = <?php echo $item['cmd']; ?>

<?php endforeach; ?></pre>
                    </div>
                    <button onclick="copyAliasConfig()" class="mt-4 w-full bg-emerald-500/20 text-emerald-300 hover:bg-emerald-500/30 border border-emerald-500/50 py-2 rounded text-xs font-bold transition">
                        <i class="fa-regular fa-copy mr-2"></i> Sao chép Cấu hình Alias
                    </button>
                </div>
            </div>
        </section>

    </main>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-5 right-5 bg-cyan-500 text-black font-bold px-4 py-3 rounded-lg shadow-lg text-xs transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2 z-50">
        <i class="fa-solid fa-circle-check text-base"></i>
        <span id="toast-msg">Đã chép nội dung!</span>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // 1. COMMAND BUILDER LOGIC
        const configOptions = {
            commit: [{
                    id: 'all',
                    label: 'Tự động add toàn bộ file (-a)',
                    flag: '-a'
                },
                {
                    id: 'amend',
                    label: 'Gộp vào commit trước đó (--amend)',
                    flag: '--amend'
                },
                {
                    id: 'message',
                    label: 'Kèm message (-m)',
                    flag: '-m',
                    needInput: true,
                    default: "update feature"
                }
            ],
            log: [{
                    id: 'oneline',
                    label: 'Hiển thị gọn trên 1 dòng (--oneline)',
                    flag: '--oneline'
                },
                {
                    id: 'graph',
                    label: 'Vẽ sơ đồ cây (--graph)',
                    flag: '--graph'
                },
                {
                    id: 'number',
                    label: 'Giới hạn số commit (-n)',
                    flag: '-n 5'
                }
            ],
            reset: [{
                    id: 'soft',
                    label: 'Giữ nguyên code ở Staging (--soft)',
                    flag: '--soft'
                },
                {
                    id: 'hard',
                    label: 'Xóa sạch mọi thay đổi (--hard)',
                    flag: '--hard'
                }
            ],
            push: [{
                    id: 'force',
                    label: 'Bắt buộc push ghi đè (-f)',
                    flag: '-f'
                },
                {
                    id: 'upstream',
                    label: 'Lưu mặc định branch (-u)',
                    flag: '-u origin main'
                }
            ]
        };

        function updateBuilder() {
            const action = document.getElementById('actionSelect').value;
            const container = document.getElementById('optionsContainer');
            const customInput = document.getElementById('customInput');

            // Render options if changed action
            if (container.dataset.action !== action) {
                container.dataset.action = action;
                container.innerHTML = configOptions[action].map(opt => `
                    <label class="flex items-center space-x-2 text-gray-300 cursor-pointer">
                        <input type="checkbox" data-flag="${opt.flag}" data-needinput="${opt.needInput || false}" onchange="buildCmd()" class="opt-check rounded bg-black border-gray-700 text-cyan-500 focus:ring-0">
                        <span>${opt.label}</span>
                    </label>
                `).join('');
            }

            buildCmd();
        }

        function buildCmd() {
            const action = document.getElementById('actionSelect').value;
            const checkboxes = document.querySelectorAll('.opt-check:checked');
            const inputVal = document.getElementById('customInput').value.trim();

            let flags = [];
            checkboxes.forEach(cb => {
                if (cb.dataset.needinput === 'true') {
                    flags.push(`${cb.dataset.flag} "${inputVal || 'update commit'}"`);
                } else {
                    flags.push(cb.dataset.flag);
                }
            });

            let extraInput = '';
            if (action === 'reset' && inputVal) extraInput = inputVal;
            if (action === 'push' && !flags.some(f => f.includes('origin')) && inputVal) extraInput = inputVal;

            const cmd = `git ${action} ${flags.join(' ')} ${extraInput}`.replace(/\s+/g, ' ').trim();
            document.getElementById('generatedCmd').innerText = cmd;
        }

        function copyGenerated() {
            const cmd = document.getElementById('generatedCmd').innerText;
            navigator.clipboard.writeText(cmd);
            showToast("Đã chép lệnh vừa tạo!");
        }

        // 2. CONFLICT RESOLVER LOGIC
        function resolveConflict(type) {
            const current = "  return $price * 1.1; // Tính VAT 10%";
            const incoming = "  return $price * 1.08; // Tính VAT 8% theo luật mới";
            const outputEl = document.getElementById('resolvedOutput');

            let finalCode = "function calculateTotal($price) {\n";
            if (type === 'current') {
                finalCode += current + "\n}";
            } else if (type === 'incoming') {
                finalCode += incoming + "\n}";
            } else {
                finalCode += current + "\n" + incoming + "\n}";
            }

            outputEl.innerText = finalCode;
            showToast("Đã mô phỏng giải quyết xung đột!");
        }

        // 3. COPY ALIAS
        function copyAliasConfig() {
            const text = document.getElementById('aliasConfigText').innerText;
            navigator.clipboard.writeText(text);
            showToast("Đã chép cấu hình Alias vào clipboard!");
        }

        // TOAST UTIL
        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').innerText = msg;
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 2500);
        }

        // Init
        updateBuilder();
    </script>
</body>

</html>