# Windows 中安装 VirtualBox 及在虚拟机中安装 Ubuntu

## 一、在 Windows 上安装 VirtualBox

### 1. 下载 VirtualBox

- 访问 [VirtualBox 官方网站](https://www.virtualbox.org)。
- 点击 `Download VirtualBox` 按钮。
- 在 `VirtualBox 7.0.x for Windows hosts` 下点击下载链接。

### 2. 安装 VirtualBox

- 双击下载的安装文件（通常是 `VirtualBox-x.x.x-x-Win.exe`）。
- 在弹出的安装向导窗口中点击 `Next`。
- 选择安装位置并点击 `Next`。
- 选择安装组件，保持默认设置即可，点击 `Next`。
- 勾选创建桌面快捷方式，点击 `Next`。
- 点击 `Install` 开始安装。
- 如果出现安全警告，点击 `Yes` 继续。
- 安装完成后点击 `Finish` 关闭安装向导。

## 二、在 VirtualBox 中安装 Ubuntu

### 1. 下载 Ubuntu ISO 镜像

- 访问 [Ubuntu 官方网站](https://ubuntu.com/download)。
- 访问 [Ubuntu Ubuntu 22.04.3 LTS 下载地址](https://ubuntu.com/download/server/thank-you?version=22.04.4&architecture=amd64&lts=true)。
- 选择 `Ubuntu Desktop`，点击 `Download`。
- 选择最新版本的 Ubuntu，点击 `Download` 下载 ISO 镜像。

### 2. 创建新的虚拟机

- 打开 VirtualBox。
- 点击 `新建` 按钮。
- 输入虚拟机名称，例如 `Ubuntu`，类型选择 `Linux`，版本选择 `Ubuntu (64-bit)`，点击 `Next`。
- 分配内存大小，推荐至少 2048 MB，点击 `Next`。
- 选择 `创建虚拟硬盘`，点击 `Create`。
- 硬盘文件类型选择 `VDI (VirtualBox Disk Image)`，点击 `Next`。
- 存储方式选择 `动态分配`，点击 `Next`。
- 设置虚拟硬盘大小，推荐至少 25 GB，点击 `Create`。

### 3. 配置虚拟机

- 选中刚创建的虚拟机，点击 `设置`。
- 在 `系统` -> `主板` 标签下，勾选 `启用 EFI`。
- 在 `存储` 标签下，点击 `空` 的光盘图标，然后点击右侧光盘图标并选择 `选择虚拟光盘文件`。
- 选择刚下载的 Ubuntu ISO 镜像文件，点击 `确定`。

### 4. 安装 Ubuntu

- 选中虚拟机，点击 `启动`。
- 虚拟机将从 ISO 镜像启动，进入 Ubuntu 安装界面。
- 选择 `安装 Ubuntu`。
- 选择键盘布局，点击 `继续`。
- 选择 `正常安装`，勾选 `下载更新` 和 `安装第三方软件`，点击 `继续`。
- 选择 `擦除磁盘并安装 Ubuntu`，点击 `继续`。
- 点击 `现在安装`，确认磁盘分区信息。
- 选择时区，点击 `继续`。
- 设置用户名和密码，点击 `继续`。
- 等待安装完成，点击 `立即重启`。

### 5. 完成安装

- 重启后，移除虚拟光盘：
    - 点击虚拟机窗口右下角的光盘图标。
    - 选择 `移除虚拟光盘`。
- 虚拟机将从虚拟硬盘启动，进入 Ubuntu 系统。

## 三、后续操作

### 1. 安装 VirtualBox Guest Additions

- 启动虚拟机中的 Ubuntu 系统。
- 在 VirtualBox 菜单中点击 `设备` -> `插入 Guest Additions CD 映像...`。
- 打开终端，输入以下命令安装依赖项：

  ```
  sudo apt update
  sudo apt install build-essential dkms linux-headers-$(uname -r)
  ```

- 挂载光盘并运行安装程序：

  ```
  sudo mount /dev/cdrom /mnt
  sudo /mnt/VBoxLinuxAdditions.run
  ```

- 安装完成后，重启虚拟机。

### 2. 配置共享文件夹

- 在 VirtualBox 菜单中点击 `设备` -> `共享文件夹` -> `共享文件夹设置`。
- 点击 `添加共享文件夹` 图标。
- 选择要共享的文件夹，勾选 `自动挂载` 和 `固定分配`，点击 `确定`。
- 在虚拟机中打开终端，添加当前用户到 `vboxsf` 组：

  ```
  sudo usermod -aG vboxsf $(whoami)
  ```

- 重新启动虚拟机即可访问共享文件夹。