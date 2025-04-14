# Git 和 GitHub 使用教程

## 注册 GitHub
1. **访问 GitHub 网站**: 打开浏览器，访问 [GitHub](https://github.com)。
2. **创建账号**:
   - 点击 “Sign up” 按钮。
   - 输入用户名、邮箱地址和密码。
   - 完成验证并点击 “Create account” 按钮。
   - 按照提示完成账号设置。

## 下载和安装 GitHub Desktop
1. **访问 GitHub Desktop 网站**: 打开浏览器，访问 [GitHub Desktop](https://desktop.github.com)。
2. **下载 GitHub Desktop**:
   - 点击 “Download for Windows” 按钮下载安装包。
3. **安装 GitHub Desktop**:
   - 打开下载的安装包并按照提示完成安装。

## 需要去了解一下其他的 Git 可视化工具
   - [Sourcetree](https://www.sourcetreeapp.com/)

## Postman 是一个很好的 API 测试工具
   - [Postman](https://www.postman.com/)

## 配置 GitHub Desktop
1. **启动 GitHub Desktop**: 安装完成后，打开 GitHub Desktop。
2. **登录 GitHub 账号**:
   - 点击 “Sign in to GitHub.com” 按钮。
   - 输入刚刚注册的 GitHub 账号和密码，然后点击 “Sign in”。
3. **配置 Git 用户信息**:
   - 点击左上角的 “File” 菜单，然后选择 “Options”。
   - 在 “Git” 选项卡中，输入用户名和邮箱地址，然后点击 “Save” 按钮。

## 常用 Git 命令和详细使用方法

### 初始化一个 Git 仓库
```bash
git init
```
**解释**: 在当前目录下初始化一个新的 Git 仓库。

### 克隆一个远程仓库
```bash
git clone <仓库地址>
```
**解释**: 克隆一个远程仓库到本地。  
**示例**: 
```bash
git clone https://github.com/username/repo.git
```

### 查看仓库状态
```bash
git status
```
**解释**: 显示当前工作目录的状态，包括修改的文件、暂存的文件等。

### 添加文件到暂存区
```bash
git add <文件名>
```
**解释**: 将文件添加到暂存区。  
**示例**:
```bash
git add index.html
```
添加所有文件到暂存区：
```bash
git add .
```

### 提交暂存区的文件
```bash
git commit -m "提交信息"
```
**解释**: 提交暂存区的文件到本地仓库，并添加提交信息。  
**示例**:
```bash
git commit -m "初次提交"
```

### 查看提交历史
```bash
git log
```
**解释**: 显示提交历史。

### 推送代码到远程仓库
```bash
git push origin <分支名>
```
**解释**: 将本地仓库的代码推送到远程仓库。  
**示例**:
```bash
git push origin main
```

### 拉取远程仓库的代码
```bash
git pull origin <分支名>
```
**解释**: 从远程仓库拉取代码并与本地代码合并。  
**示例**:
```bash
git pull origin main
```

## Git 忽略文件
在项目根目录下创建一个名为 `.gitignore` 的文件，列出需要忽略的文件和目录。常见的忽略规则如下：

```plaintext
# 忽略所有 .log 文件
*.log

# 忽略所有 node_modules 目录
node_modules/

# 忽略环境变量文件
.env

# 忽略所有 .DS_Store 文件（macOS 系统）
.DS_Store

# 忽略所有 .idea 目录（JetBrains IDE 配置文件）
.idea/

# 忽略所有 .vscode 目录（VS Code 配置文件）
.vscode/
```

### 保护敏感信息
- **永远不要将敏感信息（如密钥、密码、环境变量等）直接写入代码库**。
- **使用环境变量文件（如 `.env` 文件）存储敏感信息，并在 `.gitignore` 文件中忽略它们**。

示例 `.env` 文件内容：
```plaintext
DB_HOST=localhost
DB_USER=root
DB_PASS=secret
```

在代码中使用环境变量：
```php
<?php
$dotenv = DotenvDotenv::createImmutable(__DIR__);
$dotenv->load();

$dbHost = $_ENV['DB_HOST'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PASS'];
?>
```

## 将代码上传到 GitHub

### 创建一个新的 GitHub 仓库
1. **登录 GitHub 账号**。
2. **创建仓库**:
   - 点击右上角的 “+” 号，然后选择 “New repository”。
   - 输入仓库名称和描述（可选），选择 “Public” 或 “Private”，然后点击 “Create repository”。

### 将本地代码推送到 GitHub
1. **打开 GitHub Desktop**。
2. **添加本地仓库**:
   - 点击左上角的 “File” 菜单，然后选择 “Add local repository”。
   - 选择本地代码所在的文件夹，然后点击 “Add repository”。
3. **推送代码**:
   - 在 GitHub Desktop 中，点击右上角的 “Publish repository” 按钮。
   - 输入仓库名称和描述（可选），选择仓库的可见性（Public 或 Private），然后点击 “Publish repository”。

### 在 GitHub 网站上查看代码
1. **打开浏览器，访问 GitHub 网站**。
2. **登录 GitHub 账号**。
3. **查看仓库**:
   - 点击个人头像，选择 “Your repositories”。
   - 找到刚刚创建的仓库，点击进入，即可查看上传的代码。

## 公司常用的 Git 分支管理策略

### Git 分支模型（Git Flow）
Git Flow 是一种常见的 Git 分支管理策略，通常用于大型项目。它包括以下几个分支：
1. **master**: 主分支，存放已发布的生产代码。
2. **develop**: 开发分支，存放最新的开发代码。
3. **feature 分支**: 用于开发新功能，从 develop 分支创建，功能开发完成后合并回 develop 分支。
4. **release 分支**: 用于发布准备，从 develop 分支创建，经过测试和修复后合并到 master 和 develop 分支。
5. **hotfix 分支**: 用于紧急修复生产环境的 Bug，从 master 分支创建，修复完成后合并到 master 和 develop 分支。

### 创建和合并分支的常用命令

#### 创建分支
```bash
git checkout -b <分支名>
```
**解释**: 创建并切换到新分支。  
**示例**:
```bash
git checkout -b feature/new-feature
```

#### 切换分支
```bash
git checkout <分支名>
```
**解释**: 切换到指定分支。  
**示例**:
```bash
git checkout develop
```

#### 合并分支
```bash
git merge <分支名>
```
**解释**: 将指定分支合并到当前分支。  
**示例**:
```bash
git checkout develop
git merge feature/new-feature
```

#### 删除分支
```bash
git branch -d <分支名>
```
**解释**: 删除本地分支。  
**示例**:
```bash
git branch -d feature/new-feature
```

#### 推送分支到远程仓库
```bash
git push origin <分支名>
```
**解释**: 将本地分支推送到远程仓库。  
**示例**:
```bash
git push origin feature/new-feature
```

#### 拉取远程分支到本地
```bash
git pull origin <分支名>
```
**解释**: 从远程仓库拉取分支到本地。  
**示例**:
```bash
git pull origin develop
```

## 常见问题和解决方案

### 拒绝访问（Permission denied）
- **可能原因**: 没有权限访问远程仓库。
- **解决方法**: 
  1. 检查仓库地址是否正确。
  2. 确保有访问权限。
  3. 重新配置 SSH 密钥或使用 HTTPS 方式。

### 冲突（Merge conflict）
- **可能原因**: 远程仓库和本地仓库的代码有冲突。
- **解决方法**:
   1. 使用 `git pull` 命令拉取远程代码。
   2. 手动解决冲突。
   3. 然后再推送代码。

### 丢失提交记录（Lost commit history）
- **可能原因**: 误用了 `git reset` 或 `git rebase` 命令。
- **解决方法**: 使用 `git reflog` 找回丢失的提交记录。

## Git 和 GitHub 使用的完整流程

### 初始化本地仓库并上传到 GitHub
1. **初始化本地仓库**:
   ```bash
   git init
   ```

2. **创建 `.gitignore` 文件**:
   ```plaintext
   # 忽略所有 .log 文件
   *.log

   # 忽略所有 node_modules 目录
   node_modules/

   # 忽略环境变量文件
   .env

   # 忽略所有 .DS_Store 文件（macOS 系统）
   .DS_Store

   # 忽略所有 .idea 目录（JetBrains IDE 配置文件）
   .idea/

   # 忽略所有 .vscode 目录（VS Code 配置文件）
   .vscode/
   ```

3. **添加文件到暂存区并提交**:
   ```bash
   git add .
   git commit -m "初始化项目"
   ```

4. **创建远程仓库**:
   - 登录 GitHub，点击右上角的 “+” 号，选择 “New repository”。
   - 输入仓库名称，选择 “Public” 或 “Private”，然后点击 “Create repository”。
   - 复制仓库地址。

5. **将本地仓库连接到远程仓库并推送**:
   ```bash
   git remote add origin <远程仓库地址>
   git push -u origin main
   ```

### 常用的 Git 分支管理策略

#### Feature 分支开发
1. **创建新功能分支**:
   ```bash
   git checkout -b feature/<功能名称>
   ```

2. **在功能分支上进行开发和提交**:
   ```bash
   git add .
   git commit -m "完成功能 A 的开发"
   ```

3. **合并功能分支到开发分支**:
   ```bash
   git checkout develop
   git merge feature/<功能名称>
   ```

4. **推送开发分支到远程仓库**:
   ```bash
   git push origin develop
   ```

#### Release 分支发布
1. **创建发布分支**:
   ```bash
   git checkout -b release/<版本号> develop
   ```

2. **在发布分支上进行测试和修复**:
   ```bash
   git add .
   git commit -m "修复发布版本中的 Bug"
   ```

3. **合并发布分支到主分支和开发分支**:
   ```bash
   git checkout master
   git merge release/<版本号>
   git push origin master

   git checkout develop
   git merge release/<版本号>
   git push origin develop
   ```

4. **删除发布分支**:
   ```bash
   git branch -d release/<版本号>
   ```

#### Hotfix 分支紧急修复
1. **创建热修复分支**:
   ```bash
   git checkout -b hotfix/<修复描述> master
   ```

2. **在热修复分支上进行修复和提交**:
   ```bash
   git add .
   git commit -m "修复紧急 Bug"
   ```

3. **合并热修复分支到主分支和开发分支**:
   ```bash
   git checkout master
   git merge hotfix/<修复描述>
   git push origin master

   git checkout develop
   git merge hotfix/<修复描述>
   git push origin develop
   ```

4. **删除热修复分支**:
   ```bash
   git branch -d hotfix/<修复描述>
   ```

## 保护敏感信息的最佳实践
1. **使用环境变量文件**: 在项目根目录创建一个 `.env` 文件，存储敏感信息。
2. **忽略环境变量文件**: 在 `.gitignore` 文件中添加 `.env` 以确保其不会被提交到版本控制中。
3. **在代码中使用环境变量**:
   ```php
   <?php
   // 使用 vlucas/phpdotenv 包来加载 .env 文件中的环境变量
   require 'vendor/autoload.php';

   $dotenv = DotenvDotenv::createImmutable(__DIR__);
   $dotenv->load();

   // 访问环境变量
   $dbHost = $_ENV['DB_HOST'];
   $dbUser = $_ENV['DB_USER'];
   $dbPass = $_ENV['DB_PASS'];
   ?>
   ```