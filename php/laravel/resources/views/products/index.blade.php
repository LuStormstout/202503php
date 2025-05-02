@extends('layouts.app') {{-- 确保你有一个包含 Tailwind CSS 的布局文件 --}}

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-2xl font-semibold text-gray-900 mb-6">商品列表</h1>

        @if(!$products->isEmpty())
            <div class="flex flex-col">
                {{-- -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 是 Tailwind UI 常用的响应式表格容器模式 --}}
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        {{-- 表格外层容器，带阴影和圆角 --}}
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    {{-- 表头单元格样式 --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        名称
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        价格
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        分类ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        库存
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        状态
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        创建时间
                                    </th>
                                    {{-- 可选：更新时间 --}}
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        更新时间
                                    </th> --}}
                                    {{-- 操作列（例如：编辑、删除按钮） --}}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">操作</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                    <tr>
                                        {{-- 表格数据单元格样式 --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $product->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{-- 假设是人民币，根据需要调整货币符号和格式 --}}
                                            ¥{{ number_format($product->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->category_id }}
                                            {{-- 提示：如果你在 Controller 中 Eager Load 了分类关系 (->with('category'))，
                                                 这里可以显示分类名：$product->category->name ?? 'N/A' --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->stock }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- 使用 Tailwind 的徽章样式显示状态 --}}
                                            @if($product->status == 1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    上架
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    下架
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{-- 格式化日期时间，使其更易读 --}}
                                            {{ $product->created_at ? $product->created_at->format('Y-m-d H:i') : 'N/A' }}
                                        </td>
                                        {{-- 可选：更新时间 --}}
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->updated_at ? $product->updated_at->format('Y-m-d H:i') : 'N/A' }}
                                        </td> --}}
                                        {{-- 操作按钮示例 --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{-- route('products.edit', $product->id) --}}" class="text-indigo-600 hover:text-indigo-900 mr-3">编辑</a>
                                            {{-- 可以添加删除等其他按钮 --}}
                                            {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('确定删除吗？')">删除</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- 如果 $products 为空，@foreach 不会执行 --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 分页链接 --}}
            <div class="mt-6">
                {{-- 确保 $products 是 Paginator 实例 (通常来自 Controller 的 ->paginate()) --}}
                {{-- Laravel 会自动使用配置好的 Tailwind 分页视图 --}}
                {{ $products->links() }}
            </div>

        @else
            {{-- 如果没有产品数据，显示提示信息 --}}
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                <p class="font-bold">提示</p>
                <p>没有找到任何商品。</p>
            </div>
        @endif

    </div>
@endsection
