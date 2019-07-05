namespace go sample
namespace php sample

include "User.thrift";

struct UserList {
    1:required List<User> list;
    2:required i32 page;
    3:required i32 limit;
}