namespace go sample
namespace php sample

include "User.thrift";
include "Response.thrift";

//定义范围
service Greeter {
    Response SayHello(
        1:required User user
    )

    Response GetUser(
        1:required i32 uid
    )
}
