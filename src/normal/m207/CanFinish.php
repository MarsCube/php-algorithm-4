<?php


namespace Algorithm\normal\m207;

use SplQueue;

/**
 * 课程表
 *
 * 你这个学期必须选修 numCourses 门课程，记为 0 到 numCourses - 1 。
 *
 * 在选修某些课程之前需要一些先修课程。
 * 先修课程按数组 prerequisites 给出，其中 prerequisites[i] = [ai, bi] ，表示如果要学习课程 ai 则 必须 先学习课程  bi 。
 *
 * 例如，先修课程对 [0, 1] 表示：想要学习课程 0 ，你需要先完成课程 1 。
 * 请你判断是否可能完成所有课程的学习？如果可以，返回 true ；否则，返回 false 。
 *
 * Class CanFinish
 * @package Algorithm\normal\m207
 */
class CanFinish
{
    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    public static function handle(int $numCourses, array $prerequisites): bool
    {
        // 节点的依赖关系
        $verts = array_fill(0, $numCourses, []);
        // 节点的入度
        $inDegrees = array_fill(0, $numCourses, 0);
        // 初始化
        self::init($prerequisites, $verts, $inDegrees);
        // 广度优先遍历
        return self::bfs($verts, $inDegrees) == $numCourses;
    }

    /**
     * 初始化
     *
     * @param $prerequisites
     * @param $verts
     * @param $inDegrees
     */
    private static function init($prerequisites, &$verts, &$inDegrees)
    {
        foreach ($prerequisites as $prerequisite) {
            $verts[$prerequisite[1]][] = $prerequisite[0];
            $inDegrees[$prerequisite[0]]++;
        }
    }

    /**
     * 广度优先遍历
     *
     * @param $verts
     * @param $inDegrees
     * @return int
     */
    private static function bfs(&$verts, &$inDegrees): int
    {
        $visited = 0;
        $queue = new SplQueue();
        foreach ($inDegrees as $index => $degree) {
            if ($degree == 0) {
                $queue->enqueue($index);
            }
        }

        while (!$queue->isEmpty()) {
            $index = $queue->dequeue();
            $visited++;
            foreach ($verts[$index] as $item) {
                if (--$inDegrees[$item] == 0) {
                    $queue->enqueue($item);
                }
            }
        }
        return $visited;
    }
}