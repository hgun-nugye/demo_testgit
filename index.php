<?php
// Danh sách đầy đủ các task/câu lệnh Git từ cơ bản đến nâng cao
$gitTasks = [
    // --- 1. CẤU HÌNH & KHỞI TẠO ---
    [
        "id" => 0,
        "level" => "advanced",
        "category" => "",
        "title" => "Tổng hợp lệnh git cần dùng",
        "desc" => "Danh sách các lệnh Git cơ bản.",
        "cmd" => "git add .\n
                    git commit -m <...>\n
                    git push origin main\n
                    ------------------------\n
                    git checkout -b <ten_nhanh>\n
                    git push -u origin <ten_nhanh>\n
                    ------------------------\n
                    git checkout main\n
                    git pull origin main\n
                    git merge <ten_nhanh>\n
                    git push origin main\n
                    ------------------------\n
                    git checkout main\n
                    git branch -d <ten_nhanh>\n
                    git push origin --delete <ten_nhanh>"
    ],
    [
        "id" => 1,
        "level" => "basic",
        "category" => "Khởi tạo & Cấu hình",
        "title" => "Cấu hình danh tính người dùng",
        "desc" => "Thiết lập tên và email sẽ gắn liền với mọi commit của bạn trên máy này.",
        "cmd" => "git config --global user.name \"Tên Của Bạn\"\ngit config --global user.email \"email@example.com\""
    ],
    [
        "id" => 2,
        "level" => "basic",
        "category" => "Khởi tạo & Cấu hình",
        "title" => "Khởi tạo Repository mới",
        "desc" => "Biến thư mục hiện tại thành một Git repository.",
        "cmd" => "git init"
    ],
    [
        "id" => 3,
        "level" => "basic",
        "category" => "Khởi tạo & Cấu hình",
        "title" => "Clone (Tải) Repository có sẵn",
        "desc" => "Sao chép một dự án từ GitHub/GitLab về máy cục bộ.",
        "cmd" => "git clone https://github.com/user/repository.git"
    ],

    // --- 2. THAO TÁC HÀNG NGÀY ---
    [
        "id" => 4,
        "level" => "basic",
        "category" => "Thao tác hàng ngày",
        "title" => "Kiểm tra trạng thái dự án",
        "desc" => "Xem các file nào đã sửa đổi, chưa stage, hoặc đang chờ commit.",
        "cmd" => "git status"
    ],
    [
        "id" => 5,
        "level" => "basic",
        "category" => "Thao tác hàng ngày",
        "title" => "Thêm file vào Staging Area",
        "desc" => "Đánh dấu thay đổi để chuẩn bị commit.",
        "cmd" => "# Thêm 1 file cụ thể:\ngit add file.txt\n\n# Thêm toàn bộ thay đổi:\ngit add ."
    ],
    [
        "id" => 6,
        "level" => "basic",
        "category" => "Thao tác hàng ngày",
        "title" => "Lưu phiên bản (Commit)",
        "desc" => "Lưu lại snapshot của dự án kèm thông điệp mô tả.",
        "cmd" => "git commit -m \"Mô tả ngắn gọn về thay đổi\""
    ],
    [
        "id" => 7,
        "level" => "basic",
        "category" => "Thao tác hàng ngày",
        "title" => "Xem lịch sử Commit",
        "desc" => "Hiển thị lịch sử các lần commit trước đó.",
        "cmd" => "# Xem chi tiết:\ngit log\n\n# Xem gọn trên 1 dòng dạng đồ họa cực ngầu:\ngit log --oneline --graph --decorate --all"
    ],

    // --- 3. LÀM VIỆC VỚI NHÁNH (BRANCHING) ---
    [
        "id" => 8,
        "level" => "intermediate",
        "category" => "Quản lý Nhánh",
        "title" => "Tạo và chuyển nhánh",
        "desc" => "Tạo nhánh tính năng mới để làm việc độc lập.",
        "cmd" => "# Xem các nhánh:\ngit branch\n\n# Tạo nhánh mới và chuyển sang ngay:\ngit checkout -b feature/login\n\n# Cách mới (Git 2.23+):\ngit switch -c feature/login"
    ],
    [
        "id" => 9,
        "level" => "intermediate",
        "category" => "Quản lý Nhánh",
        "title" => "Gộp nhánh (Merge)",
        "desc" => "Gộp các thay đổi từ nhánh tính năng vào nhánh chính (main/master).",
        "cmd" => "git checkout main\ngit merge feature/login"
    ],
    [
        "id" => 10,
        "level" => "intermediate",
        "category" => "Quản lý Nhánh",
        "title" => "Xóa nhánh",
        "desc" => "Xóa nhánh sau khi đã hoàn thành và gộp xong.",
        "cmd" => "# Xóa nhánh an toàn (đã merge):\ngit branch -d feature/login\n\n# Bắt buộc xóa (chưa merge):\ngit branch -D feature/login"
    ],

    // --- 4. TƯƠNG TÁC VỚI REMOTE (REMOTE REPO) ---
    [
        "id" => 11,
        "level" => "intermediate",
        "category" => "Remote & Đồng bộ",
        "title" => "Kết nối với Remote Repository",
        "desc" => "Liên kết repo local với GitHub/GitLab.",
        "cmd" => "git remote add origin https://github.com/user/repository.git"
    ],
    [
        "id" => 12,
        "level" => "intermediate",
        "category" => "Remote & Đồng bộ",
        "title" => "Push (Tải code lên) & Pull (Tải code về)",
        "desc" => "Đồng bộ hóa dữ liệu giữa máy local và máy chủ remote.",
        "cmd" => "# Tải code mới nhất từ remote về:\ngit pull origin main\n\n# Đẩy code từ local lên remote:\ngit push -u origin main"
    ],

    // --- 5. THAO TÁC NÂNG CAO & CỨU DỮ LIỆU ---
    [
        "id" => 13,
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "title" => "Tạm lưu thay đổi (Stash)",
        "desc" => "Cất tạm các công việc đang dở dang để chuyển sang xử lý task khẩn cấp.",
        "cmd" => "# Lưu tạm:\ngit stash\n\n# Xem danh sách lưu tạm:\ngit stash list\n\n# Lấy lại công việc dở dang gần nhất:\ngit stash pop"
    ],
    [
        "id" => 14,
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "title" => "Hoàn tác thay đổi (Undo)",
        "desc" => "Hủy bỏ các thay đổi chưa commit hoặc sửa lại commit gần nhất.",
        "cmd" => "# Hủy bỏ thay đổi của 1 file chưa stage:\ngit checkout -- file.txt\n\n# Sửa thông điệp commit gần nhất:\ngit commit --amend -m \"Thông điệp mới\"\n\n# Hủy commit gần nhất nhưng giữ lại code:\ngit reset --soft HEAD~1"
    ],
    [
        "id" => 15,
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "title" => "Git Rebase (Làm sạch lịch sử)",
        "desc" => "Tái cấu trúc nhánh, giúp cây git thẳng đẹp không bị chồng chéo.",
        "cmd" => "git checkout feature/login\ngit rebase main"
    ],
    [
        "id" => 16,
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "title" => "Git Cherry-pick",
        "desc" => "Bốc riêng 1 commit cụ thể từ nhánh khác áp dụng vào nhánh hiện tại.",
        "cmd" => "git cherry-pick <commit-hash>"
    ],
    [
        "id" => 17,
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "title" => "Git Reflog (Cứu dữ liệu bá đạo)",
        "desc" => "Xem lại mọi hành động đã làm, giúp khôi phục commit đã lỡ tay xóa mất.",
        "cmd" => "# Xem nhật ký mọi thao tác:\ngit reflog\n\n# Khôi phục về trạng thái trước đó:\ngit reset --hard HEAD@{index}"
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT TERMINAL CHEATSHEET & MASTER TASKS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: JetBrains Mono -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: #0d1117;
            color: #c9d1d9;
        }

        .glow-effect {
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.2);
        }

        .glow-effect:hover {
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.4);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0d1117;
        }

        ::-webkit-scrollbar-thumb {
            background: #21262d;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #30363d;
        }
    </style>
</head>

<body class="min-h-screen pb-12">

    <!-- HEADER / HERO SECTION -->
    <header class="border-b border-gray-800 bg-gray-900/50 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <i class="fa-brands fa-git-alt text-4xl text-orange-500 animate-pulse"></i>
                <div>
                    <h1 class="text-xl font-bold text-white tracking-wider">GIT_TERMINAL // MASTER_TASKS</h1>
                    <p class="text-xs text-gray-400">Hướng dẫn sử dụng Git từ Zero đến Hero</p>
                </div>
            </div>

            <!-- STATS & PROGRESS -->
            <div class="flex items-center gap-4 bg-gray-800/60 px-4 py-2 rounded-lg border border-gray-700">
                <span class="text-xs text-gray-400">Đã hoàn thành:</span>
                <span id="progress-text" class="text-sm font-bold text-emerald-400">0/<?php echo count($gitTasks); ?></span>
                <div class="w-24 bg-gray-700 h-2 rounded-full overflow-hidden">
                    <div id="progress-bar" class="bg-emerald-500 h-full w-0 transition-all duration-300"></div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 mt-8">

        <!-- SEARCH AND FILTER CONTROLS -->
        <section class="mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Search Bar -->
            <div class="relative w-full md:w-1/2">
                <i class="fa-solid fa-terminal absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                <input type="text" id="searchInput" onkeyup="filterTasks()" placeholder="Gõ để tìm câu lệnh hoặc từ khóa (vd: commit, rebase, branch)..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-sm focus:outline-none focus:border-cyan-500 text-cyan-300 placeholder-gray-600 transition">
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-2 w-full md:w-auto">
                <button onclick="setFilter('all')" class="filter-btn active px-4 py-2 text-xs font-semibold rounded-md border border-gray-700 bg-cyan-500/10 text-cyan-400 border-cyan-500">Tất cả</button>
                <button onclick="setFilter('basic')" class="filter-btn px-4 py-2 text-xs font-semibold rounded-md border border-gray-700 bg-gray-900 text-gray-400 hover:text-emerald-400">Cơ bản</button>
                <button onclick="setFilter('intermediate')" class="filter-btn px-4 py-2 text-xs font-semibold rounded-md border border-gray-700 bg-gray-900 text-gray-400 hover:text-yellow-400">Trung cấp</button>
                <button onclick="setFilter('advanced')" class="filter-btn px-4 py-2 text-xs font-semibold rounded-md border border-gray-700 bg-gray-900 text-gray-400 hover:text-rose-400">Nâng cao</button>
            </div>
        </section>

        <!-- TASK GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="taskList">
            <?php foreach ($gitTasks as $task): ?>
                <?php
                // Set style badge theo cấp độ
                $badgeClass = "bg-emerald-500/10 text-emerald-400 border-emerald-500/30";
                $levelName = "Cơ bản";
                if ($task['level'] === 'intermediate') {
                    $badgeClass = "bg-yellow-500/10 text-yellow-400 border-yellow-500/30";
                    $levelName = "Trung cấp";
                } elseif ($task['level'] === 'advanced') {
                    $badgeClass = "bg-rose-500/10 text-rose-400 border-rose-500/30";
                    $levelName = "Nâng cao";
                }
                ?>
                <div class="task-card bg-gray-900 border border-gray-800 rounded-xl p-5 flex flex-col justify-between transition-all duration-300 hover:border-gray-700 glow-effect"
                    data-level="<?php echo $task['level']; ?>"
                    data-search="<?php echo strtolower($task['title'] . ' ' . $task['desc'] . ' ' . $task['cmd'] . ' ' . $task['category']); ?>">

                    <div>
                        <!-- Header Card -->
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full border <?php echo $badgeClass; ?>">
                                <?php echo $levelName; ?>
                            </span>
                            <label class="flex items-center cursor-pointer space-x-2">
                                <input type="checkbox" onchange="toggleTask(this)" class="task-checkbox hidden">
                                <span class="custom-check w-5 h-5 rounded border border-gray-600 flex items-center justify-center text-xs bg-gray-800 text-transparent hover:border-cyan-500 transition">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                            </label>
                        </div>

                        <span class="text-xs text-gray-500 uppercase tracking-wider block mb-1"><?php echo $task['category']; ?></span>
                        <h3 class="text-base font-bold text-white mb-2 leading-snug"><?php echo $task['id']; ?>. <?php echo $task['title']; ?></h3>
                        <p class="text-xs text-gray-400 mb-4 leading-relaxed"><?php echo $task['desc']; ?></p>
                    </div>

                    <!-- Terminal Code Snippet Box -->
                    <div class="bg-black/60 rounded-lg p-3 border border-gray-800/80 relative group">
                        <div class="flex justify-between items-center mb-2 pb-1 border-b border-gray-800/50">
                            <span class="text-[10px] text-gray-500"><i class="fa-solid fa-terminal mr-1"></i>bash</span>
                            <button onclick="copyToClipboard(this)" class="text-xs text-gray-500 hover:text-cyan-400 transition" title="Copy command">
                                <i class="fa-regular fa-copy"></i>
                            </button>
                        </div>
                        <pre class="cmd-text text-xs text-cyan-300 font-mono whitespace-pre-wrap break-all"><?php echo htmlspecialchars($task['cmd']); ?></pre>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </main>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-5 right-5 bg-cyan-500 text-black font-bold px-4 py-3 rounded-lg shadow-lg text-xs transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-base"></i>
        <span id="toast-msg">Đã chép câu lệnh vào bộ nhớ tạm!</span>
    </div>

    <!-- JAVASCRIPT FOR INTERACTION -->
    <script>
        let currentFilter = 'all';

        // Filter functionality
        function setFilter(level) {
            currentFilter = level;

            // Update active state for buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-cyan-500/10', 'text-cyan-400', 'border-cyan-500');
                btn.classList.add('bg-gray-900', 'text-gray-400');
            });
            event.target.classList.add('bg-cyan-500/10', 'text-cyan-400', 'border-cyan-500');

            filterTasks();
        }

        // Search & Filter combined logic
        function filterTasks() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.task-card');

            cards.forEach(card => {
                const levelMatch = currentFilter === 'all' || card.dataset.level === currentFilter;
                const searchMatch = card.dataset.search.includes(query);

                if (levelMatch && searchMatch) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Copy to clipboard
        function copyToClipboard(button) {
            const code = button.parentElement.nextElementSibling.innerText;
            navigator.clipboard.writeText(code).then(() => {
                showToast("Đã chép câu lệnh Git!");
            });
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').innerText = message;
            toast.classList.remove('translate-y-20', 'opacity-0');

            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 2500);
        }

        // Toggle task complete checklist
        function toggleTask(checkbox) {
            const customCheck = checkbox.nextElementSibling;
            const card = checkbox.closest('.task-card');

            if (checkbox.checked) {
                customCheck.classList.add('bg-emerald-500', 'text-black', 'border-emerald-500');
                customCheck.classList.remove('bg-gray-800', 'text-transparent');
                card.classList.add('opacity-50');
            } else {
                customCheck.classList.remove('bg-emerald-500', 'text-black', 'border-emerald-500');
                customCheck.classList.add('bg-gray-800', 'text-transparent');
                card.classList.remove('opacity-50');
            }

            updateProgress();
        }

        // Progress tracker
        function updateProgress() {
            const total = document.querySelectorAll('.task-checkbox').length;
            const checked = document.querySelectorAll('.task-checkbox:checked').length;
            const percentage = (checked / total) * 100;

            document.getElementById('progress-text').innerText = `${checked}/${total}`;
            document.getElementById('progress-bar').style.width = `${percentage}%`;
        }
    </script>
</body>

</html>