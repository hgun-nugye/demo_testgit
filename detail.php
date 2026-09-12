<?php
// detail.php - CHI TIẾT CÂU LỆNH GIT & QUY TRÌNH MERGE - PUSH

$gitDetails = [
    9 => [
        "title" => "Gộp nhánh (Merge) & Đồng bộ GitHub",
        "cmd" => "# 1. Chuyển về nhánh chính\ngit checkout main\n\n# 2. Cập nhật code mới nhất từ remote\ngit pull origin main\n\n# 3. Gộp nhánh tính năng vào main\ngit merge newbranch\n\n# 4. Đẩy kết quả đã gộp lên GitHub\ngit push origin main",
        "level" => "intermediate",
        "category" => "Quản lý Nhánh & Remote",
        "overview" => "Quy trình chuẩn để đưa toàn bộ code từ nhánh tính năng (newbranch) tích hợp vào nhánh chính (main) và đồng bộ trực tiếp lên repository trên GitHub.",
        "flags" => [
            ["flag" => "git checkout main", "desc" => "Bắt buộc phải đứng tại nhánh nhận code (main) trước khi thực hiện gộp."],
            ["flag" => ":wq", "desc" => "Lệnh thoát màn hình Vim khi Git yêu cầu nhập Commit Message (Gõ `:wq` rồi nhấn Enter)."],
            ["flag" => "-d", "desc" => "Dùng với `git branch -d newbranch` để xóa nhánh ở local sau khi đã gộp xong."],
            ["flag" => "--delete", "desc" => "Dùng với `git push origin --delete newbranch` để dọn dẹp nhánh trên GitHub."]
        ],
        "workflow" => [
            "Chuyển về nhánh `main`: `git checkout main`",
            "Tải code mới nhất từ GitHub về local: `git pull origin main`",
            "Thực hiện gộp nhánh: `git merge newbranch`",
            "Nếu màn hình Vim hiện ra thông báo Merge commit: Gõ `:wq` rồi bấm **Enter** để lưu và thoát.",
            "Đẩy kết quả gộp lên GitHub: `git push origin main`",
            "Xóa nhánh thừa nếu hoàn thành task: `git branch -d newbranch` và `git push origin --delete newbranch`"
        ],
        "scenario" => "Khi gõ `git merge`, Terminal hiện ra màn hình đen thui có chữ xanh 'Merge branch...' và không cho gõ lệnh tiếp.",
        "solution" => "Đây là trình biên soạn Vim của Git. Bạn chỉ cần gõ `:wq` rồi nhấn Enter để chấp nhận message mặc định và hoàn tất merge."
    ]
];

// Lấy ID task từ URL, mặc định là Task #9
$taskId = isset($_GET['id']) ? (int)$_GET['id'] : 9;
$data = isset($gitDetails[$taskId]) ? $gitDetails[$taskId] : $gitDetails[9];

$badgeClass = "bg-yellow-500/10 text-yellow-400 border-yellow-500/30";
$levelName = "Trung cấp";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT TERMINAL // MERGE & PUSH WORKFLOW</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: #0d1117;
            color: #c9d1d9;
        }

        .cyber-card {
            background-color: rgba(22, 27, 34, 0.8);
            border: 1px solid #30363d;
        }

        .glow-cyan {
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }

        .scanline {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.2));
            background-size: 100% 4px;
        }
    </style>
</head>

<body class="min-h-screen pb-12 scanline">

    <!-- HEADER NAVIGATION -->
    <header class="border-b border-gray-800 bg-gray-900/90 backdrop-blur sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-gray-400 hover:text-cyan-400 transition flex items-center gap-2 text-xs font-bold border border-gray-700 px-3 py-1.5 rounded bg-gray-800/50">
                    <i class="fa-solid fa-arrow-left"></i> DASHBOARD
                </a>
                <a href="features.php" class="text-gray-400 hover:text-cyan-400 transition flex items-center gap-2 text-xs font-bold border border-gray-700 px-3 py-1.5 rounded bg-gray-800/50">
                    <i class="fa-solid fa-microchip"></i> LAB TOOLS
                </a>
            </div>
            <span class="text-xs text-gray-500 font-mono">TASK_ID: #<?php echo sprintf("%03d", $taskId); ?></span>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-8 space-y-8">

        <!-- TITLE & OVERVIEW SECTION -->
        <section class="cyber-card p-6 rounded-xl border-l-4 border-l-cyan-500">
            <div class="flex flex-wrap justify-between items-start gap-4 mb-3">
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-widest block mb-1"><?php echo $data['category']; ?></span>
                    <h1 class="text-2xl font-bold text-white tracking-wide glow-cyan"><?php echo $data['title']; ?></h1>
                </div>
                <span class="text-xs font-bold px-3 py-1 rounded-full border <?php echo $badgeClass; ?>">
                    <?php echo $levelName; ?>
                </span>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed mt-4 bg-black/30 p-4 rounded border border-gray-800/60">
                <i class="fa-solid fa-circle-info text-cyan-400 mr-2"></i><?php echo $data['overview']; ?>
            </p>
        </section>

        <!-- COMMAND BLOCK -->
        <section class="cyber-card p-6 rounded-xl">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-wider">// CÁC CÂU LỆNH THỰC THI (TERMINAL COMMANDS)</h2>
                <button onclick="copyCmd()" class="text-xs bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/40 px-3 py-1.5 rounded border border-cyan-500/40 transition">
                    <i class="fa-regular fa-copy mr-1"></i> Sao chép tất cả
                </button>
            </div>
            <div class="bg-black p-4 rounded-lg border border-gray-800 relative group">
                <pre id="cmdText" class="text-sm font-mono text-cyan-300 whitespace-pre-wrap leading-relaxed"><?php echo htmlspecialchars($data['cmd']); ?></pre>
            </div>
        </section>

        <!-- FLAGS & SPECIAL KEYS -->
        <section class="cyber-card p-6 rounded-xl">
            <h2 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-4">// LỆNH MỞ RỘNG & PHÍM TẮT THOÁT VIM</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($data['flags'] as $item): ?>
                    <div class="bg-black/50 p-3.5 rounded border border-gray-800/80">
                        <code class="text-xs font-bold text-yellow-300 bg-yellow-950/40 px-2 py-0.5 rounded border border-yellow-800/50 block w-fit mb-2">
                            <?php echo $item['flag']; ?>
                        </code>
                        <p class="text-xs text-gray-400 leading-normal"><?php echo $item['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- RECOMMENDED WORKFLOW -->
            <section class="cyber-card p-6 rounded-xl">
                <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-wider mb-4">// BẢNG GHI NHỚ QUY TRÌNH (STEP-BY-STEP)</h2>
                <ol class="space-y-3">
                    <?php foreach ($data['workflow'] as $index => $step): ?>
                        <li class="flex items-start text-xs text-gray-300 leading-relaxed">
                            <span class="flex-shrink-0 w-6 h-6 rounded bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 font-bold flex items-center justify-center mr-3 mt-0.5">
                                <?php echo $index + 1; ?>
                            </span>
                            <span class="pt-1"><?php echo $step; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>

            <!-- TROUBLESHOOTING & SCENARIO -->
            <section class="cyber-card p-6 rounded-xl border-l-4 border-l-rose-500">
                <h2 class="text-xs font-bold text-rose-400 uppercase tracking-wider mb-4">// XỬ LÝ MÀN HÌNH VIM KHI MERGE</h2>
                <div class="space-y-4">
                    <div class="bg-rose-950/20 p-3.5 rounded border border-rose-900/40">
                        <span class="text-[10px] text-rose-400 font-bold uppercase block mb-1"><i class="fa-solid fa-terminal mr-1"></i>Hiện tượng:</span>
                        <p class="text-xs text-gray-300 italic"><?php echo $data['scenario']; ?></p>
                    </div>
                    <div class="bg-emerald-950/20 p-3.5 rounded border border-emerald-900/40">
                        <span class="text-[10px] text-emerald-400 font-bold uppercase block mb-1"><i class="fa-solid fa-key mr-1"></i>Cách thoát màn hình Vim:</span>
                        <p class="text-xs text-emerald-300 font-mono"><?php echo $data['solution']; ?></p>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-5 right-5 bg-cyan-500 text-black font-bold px-4 py-3 rounded-lg shadow-lg text-xs transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2 z-50">
        <i class="fa-solid fa-circle-check text-base"></i>
        <span>Đã sao chép câu lệnh vào bộ nhớ tạm!</span>
    </div>

    <script>
        function copyCmd() {
            const code = document.getElementById('cmdText').innerText;
            navigator.clipboard.writeText(code).then(() => {
                const toast = document.getElementById('toast');
                toast.classList.remove('translate-y-20', 'opacity-0');
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0');
                }, 2500);
            });
        }
    </script>
</body>

</html>